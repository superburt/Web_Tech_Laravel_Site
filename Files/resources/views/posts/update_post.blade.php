@extends('layouts.master')

@section('title')
  Update Post
@endsection

@section('content')
<h1>Phasebook</h1>
<div class ="container">
    <h2>Update Post</h2>
    <form method="post" action= "{{url("update_post_action")}}">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$post->id}}">
        <input type="hidden" name="Icon" value="images/anonymous+app+contacts+open+line+profile+user+icon-1320183042822068474_512.png">
        <label>Title</label>
        <input type="text" name="Title"><br>
        <label>Name</label>
        <input type="text" name="Name"><br>
        <label>Body</label>
        <textarea type="text" name="Body"></textarea><br>
        <label>Date</label>
        <input type="text" name="Date"><br>
        <input type="submit" value="Update Post"><br>
    </form>
</div>
@endsection