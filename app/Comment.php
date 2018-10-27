<?php

namespace App;


use App\Team;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    const VALIDATION_RULES = [
        'content' => 'required | min:10'
    ];
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
