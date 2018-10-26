<?php

namespace App;

use App\Team;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded = ['id'];

    public function team()
   {
       return $this->belongsTo(Team::class);
   }
}
