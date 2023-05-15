<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'event_type',
        'date',
        'start_time',
        'end_time',
        'description',
        'user_id',
    ];
    
    public static function store($request, $id = null)
    {
        $event = $request->only(['event_type', 'date', 'start_time', 'end_time', 'description',"user_id"]);
        $events = self::updateOrCreate(["id" => $id], $event);
        $team = request('teams');
        $events->teams()->sync($team);
        return $events;
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function teams(){
        return $this->belongsToMany(Team::class, 'team_events');
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
