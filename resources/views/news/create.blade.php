@extends('layouts.master')

@section('title')
    Create News
@endsection

@section('content')
    <form method="POST" action="/news">

        {{ csrf_field() }}
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
            @include('layouts.partials.error-message', ['field' => 'title'])
        </div>
        <div class="form-group">
                <label>Contnet</label> 
                <textarea type="textarea" class="form-control" id="content" name="content" placeholder="Enter news"></textarea>
                @include('layouts.partials.error-message', ['field' => 'contnet'])
        </div>
        <div class="form-group form-check">
                <label>Select team</label><br>
           @foreach ($teams as $team)
            
                <input type="checkbox" class="form-check-input" name="teams[]" value="{{ $team->id}}"> {{ $team->name}}<br>
                

           @endforeach
                
         
                
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection