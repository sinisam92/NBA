@extends('layouts.master')

@section('title')

    News

@endsection

@section('content')
    
@foreach($news as $singleNews)
    <div class="blog-post">
        <h2 class="blog-post-title">
                <a href="/news/{{ $singleNews->id }}">
                    {{ $singleNews->title }}
                </a>
        </h2>
        <p>Writen by {{ $singleNews->user->name }}</p>
        <p>Created at: {{ $singleNews->created_at }}</p>
    </div>
    <hr>
@endforeach
    {{ $news->links() }}

@endsection