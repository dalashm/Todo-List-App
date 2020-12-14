<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $guarded = [];

    //The Realtion Between Todo And Todo_Item (One Todo Has Many Todo_Items)
    public function todoitems()
    {
        return $this->hasMany(\App\Models\TodoItem::class);
    }
}
