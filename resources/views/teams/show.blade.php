@extends('layouts.master')

@section('title')

    {{ $team->name }}

@endsection

@section('content')
    <h2><a href="/">All Teams</a></h2>
    <div class="blog-post">
        <h2 class="blog-post-title">
            {{ $team->name }}
        </h2>

        <h3>{{ $team->email}}</h3>
        <p>{{ $team->address }}</p>
        <p>{{ $team->city }}</p>

    </div>