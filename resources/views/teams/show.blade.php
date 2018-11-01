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
        
        <h3>News related to this team: </h3>
       @foreach ($team->news as $singleNews)
            <li>
                {{$singleNews->title}}
            </li>
       @endforeach
            <h2>ROSTER</h2>
           
        
            @foreach ($team->players as $player)
                <p><a href="/players/{{$player->id}}">{{$player->first_name}} {{$player->last_name}}</a></p>
                 
            @endforeach

            @if(count($team->comments))

            <h4>Comments</h4>
            <ul class="list-unstyled">
                @foreach($team->comments as $comment)
                    <li>
                        <hr>
                        <p> {{ $comment->content }} </p>
                    </li>
                @endforeach
            </ul>
        @endif
        <h4>Comment on this team?</h4>
        <form method="POST" action="/teams/{{ $team->id }}/comments">

            {{ csrf_field() }}
            <div class="form-group">
                    <label>Comment</label> 
                    <textarea type="textarea" class="form-control" id="content" name="content" placeholder="Enter comment"></textarea>
                    @include('layouts.partials.error-message', ['field' => 'content'])
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>        
</div>
@endsection