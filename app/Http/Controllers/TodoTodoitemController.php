<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoTodoitemController extends Controller
{

     /**
     * Show the form for creating a new Todoitem in Todo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $todo = Todo::findOrFail($id);
        return view("todo.createTodoitem", compact("todo"));
    }
}
