@extends('layouts.master')

@section('title')
  Add Post
@endsection

@section('content')
  <h1>Add Post</h1>
  <form method="post" action= "{{url("add_post_action")}}">
    {{csrf_field()}}
    <label>Title</label><br>
    <input type="text" name="Title"><br>
    <label>Name</label><br>
    <textarea type="text" name="Name"></textarea><br>
    <label>Body</label><br>
    <textarea type="text" name="Body"></textarea><br>
    <label>Date</label><br>
    <textarea type="text" name="Date"></textarea><br>
    <input type="submit" value="Add"><br>
    
  </form>
@endsection