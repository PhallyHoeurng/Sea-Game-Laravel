<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'stadium',
        'zone',
        'event_id',
    ];

    public static function store($request, $id = null)
    {
        $ticket = $request->only(['price','stadium','zone', 'event_id']);
        $ticket = self::updateOrCreate(["id" => $id], $ticket);
        return $ticket;
    }

    public function events(){
        return $this->belongsTo(Event::class);
    }
}
