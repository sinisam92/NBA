<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 'content', 'user_id',
    ];
    const VALIDATION_RULES = [
        'title' => 'required',
        'content' => 'required',
        'teams' => 'required | array',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function team()
    {
        return $this->belongsToMany(Team::class);
    }
}
