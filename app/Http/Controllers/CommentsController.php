<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        //zabranjujemo ne ulogovanim userima da se zajebavaju po sajtu :D
        $this->middleware('auth');
        //upotrebljavamo custom middleware da zabranimo reci u kometarima na metodu store 
        $this->middleware('forbidden_words', ['only' => 'store']);
    }
   public function store($teamId)
   {
       //cupamo team po teamId iz baze , validatiramo ga i ako se prodje idemo na create
       $team = Team::findOrFail($teamId);
       $this->validate(
           request(),
           Comment::VALIDATION_RULES
       );

       //kreiramo komentar
       $team->comments()->create(request()->all());

       return redirect("/teams/{$teamId}");
   }
}
