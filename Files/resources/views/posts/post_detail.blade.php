@extends('layouts.master')

@section('title')
  Post Comments
@endsection

@section('content')


      <h1>Phasebook</h1>
        <ul>
          <li><a id="link" href="{{url("post_detail/$post->id")}}"><img src = "{{asset("$post->Icon")}}">{{$post->Name}}, says:<br> {{$post->Title}}<br>Message: {{$post->Body}}<br>Submitted on: {{$post->Date}}</a><br><a href="{{url("delete_post/$post->id")}}">Delete Post</a><br>
          <a href="{{url("update_post/$post->id")}}">Update Post</a><br></li>
        </ul>
      <h1>COMMENTS</h1>
        <ul>
        @foreach($comments as $comment)
          <li><img src = "{{asset("$comment->Icon")}}"><a href="{{url("delete_comment/$comment->id")}}">Delete Post</a>{{$comment->Name}}, says:<br> <br>Message: {{$comment->Body}}<br>Submitted on: {{$comment->Date}}</li>
        @endforeach
        </ul>
        
        <div class ="container">
          <h2>Add a Comment</h2>
            <form method="post" action= "{{url("add_comment_action")}}">
              {{csrf_field()}}
              <input type="hidden" name="Icon" value="images/anonymous+app+contacts+open+line+profile+user+icon-1320183042822068474_512.png">
              <label>Name</label>
              <input type="text" name="Name"><br>
              <label>Body</label>
              <textarea type="text" name="Body"></textarea><br>
              <label>Date</label>
              <input type="text" name="Date"><br>
              <input type="hidden" name="Post_ID" value="{{$post->id}}">
              <input type="submit" value="Add"><br>
            </form>
        </div>
        <br>
@endsection 
