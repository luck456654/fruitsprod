<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'fruits';

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'count' => $this->count
        ];
    }
}
