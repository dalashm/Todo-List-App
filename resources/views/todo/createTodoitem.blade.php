@extends('layouts.master')

@section('title',"Todoitem")
    
@section('content')
    <h1 class="text-center">Create Todo Item </h1>
    <form action="{{ route("todoitem.store") }}" method="POST">
        @csrf
        <div class="form-group w-25">
          <label for="name">Name</label>
          <input type="name" name="name" class="form-control" id="name" value={{ old("name") }}>
    @error('name')
    <div class="text-danger"> {{ $message }} </div>
    @enderror
        </div>

        
        <div class="form-group{{ $errors->has('todo_id') ? ' has-danger' : '' }} w-25">
            <label class="form-control-label" for="input-todo_id">{{ __('Todo') }}</label>
  <select class="form-control" name="todo_id" id="input-todo_id" required>
      <option value="{{$todo->id}} ">{{$todo->name}} </option>
      
  </select>
            @if ($errors->has('todo_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('todo_id') }}</strong>
                </span>
            @endif
        </div>


        <input type="submit" class="btn btn-outline-success" value="New Todoitem" >
        <a href=" {{ route("todo.index") }}" class="btn btn-outline-danger">Back To All Todoitem</a>
       
      </form>
@endsection