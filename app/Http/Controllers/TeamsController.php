<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\News;


class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        return view('teams.index', ['teams' => $teams]);
    }
    public function show($id)
    {
        $team = Team::with('news')->findOrFail($id);

        $team->news()->sync($request->input('teams'));
        return view('teams.show',['team' => $team]);
    }
    
}
