<?php

namespace App\Http\Controllers;


use App\Player;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function index()
    {
        $players = Player::all();

        return view('teams.show', ['players' => $players]);
    }
    public function show($id)
    {
        $player = Player::findOrFail($id);

        return view('players.show', ['player' => $player]);
    }
}
