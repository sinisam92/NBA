@extends('layouts.master')

@section('title')
    Player Profile
@endsection

@section('content')
<div class="blog-post container">
    <h2 class="blog-post-title">
     <h2>Player Profile</h2>
            First Name:<h3>{{ $player->first_name }}</h3>
             Last Name: <h3>{{ $player->last_name }}</h3>
        </h2>

        Email: <h3>{{ $player->email}}</h3>
        Current Team: <h2><a href="/teams/{{ $player->team->id }}">{{ $player->team->name }}</a></h2>
          
</div>