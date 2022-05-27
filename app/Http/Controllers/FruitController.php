<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    /**
     * @return Fruit[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Fruit::all();
    }

    public function addCount(Request $request, $id)
    {
        try {
            $fruit = Fruit::findOrFail($id);
            $fruit->count += $request->exists('minus') ? -1 : 1;
            $fruit->save();
        } catch (\Exception $exception) {
            return response()->json(['code' => 400, 'message' => 'Такого фрукта не существует'], 400);
        }
        return response()->json(['code' => 200, 'message' => 'Количество фрукта изменено', 'count' => $fruit->count], 200);
    }
}
