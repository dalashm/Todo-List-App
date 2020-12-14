<?php

use Illuminate\Support\Facades\Route;


//Home Route
Route::get('/', function () {
    return view('welcome');
});

//Todo Route
Route::resource('/todo', 'TodoController');

//Todo_Item Route
Route::resource('/todoitem', 'TodoItemController');

//Todo_Item Route in Their Todo
Route::resource('/todo.todoitem', 'TodoTodoitemController');
