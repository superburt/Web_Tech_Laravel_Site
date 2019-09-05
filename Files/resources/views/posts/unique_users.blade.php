@extends('layouts.master')

@section('title')
  Social Media Site
@endsection

@section('content')
  <h1>Phasebook</h1>
    <div class ="container">
  @if ($posts)
    <ul>
    @foreach($posts as $post)
      <li><a id="link" href="{{url("user_posts/$post->Name")}}">{{$post->Name}}</a>
      </li>
    @endforeach
    </ul>
  @else
    No post found
  @endif
@endsection 
