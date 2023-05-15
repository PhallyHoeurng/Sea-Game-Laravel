<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team = Team::all();
        $team = TeamResource ::collection($team);
        return response()->json(['success' => true, 'data' => $team],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        $team = Team::store($request);
        return  response()->json(['success' => true, 'data' => $team], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $team = Team::find($id);
        $team = new TeamResource($team);
        return  response()->json(['success' => true, 'data' =>  $team], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, string $id)
    {
        $team = Team::store($request, $id);
        return  response()->json(['success' => true, 'data' => $team], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::find($id);
        $team->delete();
        return  response()->json(['success' => true, 'delete successfuly'], 200);
    }
}
