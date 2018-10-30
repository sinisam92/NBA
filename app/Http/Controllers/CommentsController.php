<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('forbidden_words', ['only' => 'store']);
    }
   public function store($teamId)
   {
       $team = Team::findOrFail($teamId);
       $this->validate(
           request(),
           Comment::VALIDATION_RULES
       );

       $team->comments()->create(request()->all());

       return redirect("/teams/{$teamId}");
   }
}
