<?php

namespace App\Http\Controllers;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
class TicketController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticket = Ticket::all();

        return response()->json(['success' => true, 'data' => $ticket],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = Ticket::store($request);

        return  response()->json(['success' => true, 'data' => $ticket], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);
        $ticket = new TicketResource($ticket);

        return  response()->json(['success' => true, 'data' =>  $ticket], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $id)
    {
        $ticket = Ticket::store($id);

        return  response()->json(['success' => true, 'data' => $ticket], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();

        return  response()->json(['success' => true, 'delete successfuly'], 200);
    }

    ///buy ticket specified resource from storage.
    public function purchase($id)
    {
        $ticket = Ticket::find($id);
    
        // Check if the ticket exists
        if (!$ticket) {
            return response()->json(['error' => false, 'ticket not found'], 404);
        }
    
        // Check if the ticket has already been purchased
        if ($ticket->purchased) {
            return response()->json(['success' => true, 'Ticket has already been purchased.'], 200);
        }
    
        // Purchase the ticket
        $ticket->purchased = true;
        $ticket->save();
    
        return response()->json(['successfully' => true,'data' => $ticket],200);
    }
}
