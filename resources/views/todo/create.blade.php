@extends('layouts.master')

@section('title',"Todo")
    
@section('content')
    <h1 class="text-center mt-3">Create New Todo</h1>
    <form action="{{ route("todo.store") }}" method="POST">
        @csrf
        <div class="form-group w-25">
          <label for="name">Name</label>
          <input type="name" name="name" class="form-control" id="name" value={{ old("name") }}"">
    @error('name')
    <div class="text-danger"> {{ $message }} </div>
    @enderror
        </div>
        <input type="submit" class="btn btn-outline-success" value="New Todo" >
        <a href=" {{ route("todo.index") }}" class="btn btn-outline-danger">Back To All Todo</a>
       
      </form>
@endsection