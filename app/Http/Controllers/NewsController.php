<?php

namespace App\Http\Controllers;

use App\News;
use App\Team;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(10);
        return view('news.index', ['news' => $news]);
    }
    public function show($id)
    {
        $singleNews = News::with('team')->findOrFail($id);

        return view('news.show', ['singleNews' => $singleNews]);
    }
    public function create()
    {
        return view('news.create');
    }
    public function store($teamId)
    {
        $news = Team::findOrFail($teamId);
        $this->validate(
            request(),
            News::VALIDATION_RULES
        );

        $news->team()->create(request()->all());

        session()->flash('message', 'Thank you for publishing article on www.nba.com');

        return redirect("/news");
    }
}
