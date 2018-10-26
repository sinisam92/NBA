<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        return view('teams.index', ['teams' => $teams]);
    }
    public function show($id)
    {
        $team = Team::findOrFail($id);

        return view('teams.show',['team' => $team]);
    }
}
