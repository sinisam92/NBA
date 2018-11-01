@extends('layouts.master')

@section('title')
    News
@endsection

@section('content')
<div class="blog-post container">
    <h2 class="blog-post-title">
        <h3>{{ $singleNews->title }}</h3>
    </h2>
    <p>Written by {{ $singleNews->user->name }}</p>
    <h2>{{ $singleNews->team_id }}</h2>  
    <p>{{ $singleNews->content }}</p> 

    <p>This news referes to teams: </p>
    @foreach ($singleNews->team as $oneNews)
        <li>{{$oneNews->name}}</li>
    @endforeach         
</div>

@endsection