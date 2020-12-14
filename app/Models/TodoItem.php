<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    use HasFactory;
    protected $guarded = [];

      //The Realtion Between Todo_Item And Todo (Todo_Items Belongs To Todo) 
    public function todo()
    {
        return $this->belongsTo(\App\Models\Todo::class);
    }
}
