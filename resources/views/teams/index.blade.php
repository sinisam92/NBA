@extends('layouts.master')

@section('title')
    TEAMS
@endsection

@section('content')
    
<h1>Teams</h1>
    <ul>
        @foreach($teams as $team)
        <li>
            <div class="blog-post">
                <h2 class="blog-post-title">
                        <a href="/teams/{{ $team->id }}">
                            {{ $team->name }}
                        </a>
                </h2>
            </div>
        </li>
        @endforeach

    </ul>
@endsection



