@extends('layouts.master')

@section('title')
  Social Media Site
@endsection

@section('content')
  <h1>Phasebook</h1>
  @if ($posts)
    <ul>
    @foreach($posts as $post)
      <li><a id="link" href="{{url("post_detail/$post->id")}}"><img src="{{$post->Icon}}">{{$post->Name}}, says:<br> {{$post->Title}}<br>Message: {{$post->Body}}<br>Submitted on:{{$post->Date}}</a></li>
    @endforeach
    </ul>
  @else
    No post found
  @endif
@endsection 