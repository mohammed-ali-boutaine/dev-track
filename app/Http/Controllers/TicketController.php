<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Ticket;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TicketController extends Controller
{
    //

    public function index()
    {
        $clientId = Auth::id();
        $client = Client::find($clientId);

        // echo "<pre>";
        return $client->tickets;
        // return $client;
        // echo "</pre>";

        // select all ticket and pass them to view 
    }

    public function create()
    {
        // return ticket form
        $softwares = Software::get();
        return  view('ticket.create', compact('softwares'));
    }
    public function store(Request $request)
    {
        // store tickets

        $request->validate([
            'title' => 'required|string|max:255',
            'systeme' => 'required|string|max:255',
            'software_id' => 'required|exists:softwares,id',
            'description' => 'nullable|string',
        ]);

        $ticket = Ticket::create([
            'title' => $request->title,
            'systeme' => $request->systeme,
            'software_id' => $request->software_id,
            'description' => $request->description,
            'client_id' => Auth::id()

        ]);

        // Redirect with success message
        return redirect()->route('dashboard')->with('success', 'Ticket created successfully!');
    }

    public function show($id)
    {
        $ticket = Ticket::find($id);
        return view('ticket.show', compact('ticket'));
    }

    public function edit() {}

    public function update() {}

    // delete ticket
    public function destroy($id)
    {
        $ticket = Ticket::find($id);

        // if ($ticket->user_id !== Auth::id() ) {
        //     return redirect()->route('ticket.index')->with('error', 'Unauthorized');
        // }
        $ticket->delete();
    }
}
