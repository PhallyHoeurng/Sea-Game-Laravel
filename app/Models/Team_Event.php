<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team_Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'team_id',
    ];

    public function eventName(){
        return $this->belongsToMany(Event::class, 'events');
    }

    public function teams(){
        return $this->hasMany(Team::class);
    }
    public function events(){
        return $this->hasMany(Event::class);
    }
    public static function store($request, $id = null)
    {
        $team_event = $request->only(['event_id', 'team_id']);
        $team_event = self::updateOrCreate(["id" => $id], $team_event);
        return $team_event;
    }

}
