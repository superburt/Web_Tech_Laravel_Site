@extends('layouts.master')

@section('title')
  Social Media Site
@endsection

@section('content')
  <h1>Phasebook</h1>
    <div class ="container">
      <h2>Add Post</h2>
        <form method="post" action= "{{url("add_post_action")}}">
          {{csrf_field()}}
          <input type="hidden" name="Icon" value="images/anonymous+app+contacts+open+line+profile+user+icon-1320183042822068474_512.png">
          <label>Title</label>
          <input type="text" name="Title"><br>
          <label>Name</label>
          <input type="text" name="Name"><br>
          <label>Body</label>
          <textarea type="text" name="Body"></textarea><br>
          <label>Date</label>
          <input type="text" name="Date"><br>
          <input type="submit" value="Add"><br>
        </form>
    </div>
  <br>
  
  @if ($posts)
    <ul>
    @foreach($posts as $post)
      <li><a id="link" href="{{url("post_detail/$post->id")}}"><img src="{{$post->Icon}}">{{$post->Name}}<br> {{$post->Title}}<br>Message: {{$post->Body}}<br>Submitted on: {{$post->Date}}<br> Number of Comments: {{$post->Comment_Count}}</a>
      </li>
    @endforeach
    </ul>
  @else
    No post found
  @endif
@endsection 
