<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'members',
        'user_id',
    ];

    public static function store($request, $id = null)
    {
       $ticket = $request->only(['name', 'members', 'user_id']);
       $ticket = self::updateOrCreate(["id" => $id],$ticket);
        return$ticket;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function events(){
        return $this->belongsToMany(Event::class, 'team_events');
    }

}
