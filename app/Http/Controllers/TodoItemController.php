<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\TodoItem;
use Illuminate\Http\Request;

class TodoItemController extends Controller
{

    /**
     * Show the form for creating a new Todoitems.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("todoitem.create");
    }

    /**
     * Store a newly created Todoitem in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:20',
        ]);

        $todoitem = new TodoItem;
        $todoitem->name = request("name");
        $todoitem->todo_id = $request->input("todo_id");
        $todoitem->save();

        return redirect(route("todo.index"))->with('success', 'Todo Item Created Succesufuly');;
    }

    /**
     * Display the specified Todoitem.
     *
     * @param  \App\Models\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function show(TodoItem $todoItem)
    {
        //
    }

    /**
     * Show the form for editing the specified Todoitem.
     *
     * @param  \App\Models\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todoItem = TodoItem::findOrFail($id);
        return view('todoitem.edit', compact('todoItem'));
    }

    /**
     * Update the specified Todoitem in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4|max:20',
        ]);
        $todoItem = TodoItem::findOrFail($id);
        $todoItem->name = request("name");
        $todoItem->save();
        return redirect()->route('todo.index')->with('success', 'Todo Item Updated Succesufuly');
    }


    /**
     * Remove the specified Todoitem from database.
     *
     * @param  \App\Models\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todoItem = TodoItem::findOrFail($id);
        $todoItem->delete();
        if (request()->ajax()) {
            return response()->json(['status' => 200, 'id' => $todoItem->id]);
        }
        return redirect()->route('todo.index')->with('success', 'Todo Item Deleted Succesufuly');
        if (request()->ajax()) {
            return response()->json(['status' => 480, 'msg' => 'Todo Item Cannnot Deleted']);
        }
        return redirect()->route('todo.index')->with('error', 'Todo Item Cannnot Deleted');
    }
}
