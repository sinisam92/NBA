<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;




class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        // $teams = $team->news()->with('news')->latest()->paginate(10);

        return view('teams.index', ['teams' => $teams]);
        // return view('teams.index')->with('teams', $teams);
    }
    public function show($id)
    {
        $team = Team::with('news')->findOrFail($id);

        // $team->news()->sync($request->input('teams'));
        return view('teams.show',['team' => $team]);
    }
    
}
