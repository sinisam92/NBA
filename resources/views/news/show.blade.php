@extends('layouts.master')

@section('title')
    Player Profile
@endsection

@section('content')
<div class="blog-post container">
    <h2 class="blog-post-title">
        <h3>{{ $singleNews->title }}</h3>
    </h2>
    <p>Written by {{ $singleNews->user->name }}</p>
    <p>{{ $singleNews->content }}</p>          
</div>

@endsection