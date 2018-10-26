@extends('layouts.master')

@section('title')

    {{ $team->name }}

@endsection

@section('content')
<div class="blog-post container">
    <h2 class="blog-post-title">
     <h2><a href="/">All Teams</a></h2>
            {{ $team->name }}
        </h2>

        <h3>{{ $team->email}}</h3>
        <p>{{ $team->address }}</p>
        <p>{{ $team->city }}</p>
            <h2>ROSTER</h2>
           
        
            @foreach ($team->players as $player)
                <p><a href="/players/{{$player->id}}">{{$player->first_name}} {{$player->last_name}}</a></p>
                 
            @endforeach
                
          
</div>