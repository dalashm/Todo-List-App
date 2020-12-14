@extends('layouts.master')

@section('title',"Home")
    
@section('content')
<div class="text-center mt-4">
    <h1>Welcome To Our Todo App </h1>
    <h1>&#129071;</h1>
    <h1>&#129071;</h1>
    <h1>&#129071;</h1>
    <h1>&#129071;</h1>
    <h1>&#129071;</h1>
    <h1>&#129071;</h1>
    <a href=" {{route("todo.index")}} " class="btn btn-dark">Press Here To See And Add New Todo</a>
</div>
@endsection