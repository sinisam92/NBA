<?php

namespace App\Http\Controllers;

use App\News;
use App\Team;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        return view('news.index', ['news' => $news]);

    }
    public function show($id)
    {
        $singleNews = News::with('team')->findOrFail($id);

        return view('news.show', ['singleNews' => $singleNews]);
    }
    public function create()
    {
        $teams = Team::all();

        return view('news.create')->with('teams', $teams);
    }
    public function store()
    {
        

        $news = new News();
        $news->title = request('title');
        $news->content = request('content');
        $news->user_id = auth()->user()->id;
        $news->save();

    
        $news->team()->attach(request('teams'));

        session()->flash('message', 'Thank you for publishing article on www.nba.com');

        return redirect("/news");
    }
}
