<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event_TeamRequest;
use App\Http\Requests\EventRequest;
use App\Http\Resources\Event_TeamResource;
use App\Models\TeamEvent;
use Illuminate\Http\Request;

class TeamEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event_team = TeamEvent::all();

        return response()->json(['success' => true, 'data' => $event_team],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Event_TeamRequest $request)
    {
        $event_team = TeamEvent::store($request);

        return  response()->json(['success' => true, 'data' => $event_team], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event_team = TeamEvent::find($id);
        $event_team = new Event_TeamResource($event_team);

        return  response()->json(['success' => true, 'data' =>  $event_team], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Event_TeamRequest $request, string $id)
    {
        $event_team = TeamEvent::store($request, $id);

        return  response()->json(['success' => true, 'data' => $event_team], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event_team = TeamEvent::find($id);
        $event_team->delete();
        
        return  response()->json(['success' => true, 'delete successfuly'], 200);
    }
}
