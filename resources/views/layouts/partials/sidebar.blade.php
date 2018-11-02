<div class="p-3">
    <h4 class="font-italic">Teams</h4>
    <ol class="list-unstyled mb-0">
        @foreach($teams as $team)
            <li>
                <a href="/teams/{{ $team->id }}">{{ $team->name }}</a>
                
            </li> 
        @endforeach
    

    </ol>
</div>