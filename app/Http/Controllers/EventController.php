<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::all();
        $event = EventResource ::collection($event);
        return response()->json(['success' => true, 'data' => $event],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $event = Event::store($request);
        return  response()->json(['success' => true, 'data' => $event], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        $event = new EventResource($event);
        return  response()->json(['success' => true, 'data' =>  $event], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $id)
    {
        $event = Event::store($request, $id);
        return  response()->json(['success' => true, 'data' => $event], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return  response()->json(['success' => true, 'delete successfuly'], 200);
    }

    ///search name event 
    public function searchEvent($event)
    {
        $events = Event::where('event_type','like','%'.$event.'%')->get();
        return $events;
    }

}