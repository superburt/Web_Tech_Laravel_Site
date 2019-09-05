@extends('layouts.master')

@section('title')
  Social Media Site
@endsection

@section('content')
  <h1>Phasebook</h1>
    <div class ="container">
  @if ($posts)
    <ul>
        <h3>Posts</h3>

    @foreach($posts as $post)
      <li>{{$post->Name}}<br>{{$post->Title}}<br>{{$post->Body}}<br>{{$post->Date}}
      </li>
    @endforeach
    </ul>
  @else
    No post found
  @endif
@endsection 