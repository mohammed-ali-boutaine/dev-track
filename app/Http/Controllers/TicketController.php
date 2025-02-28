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
    // Update Ticket Status
    public function updateStatus(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $validated = $request->validate(['status' => 'required|in:open,progress,closed']);

        $ticket->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', 'Status updated successfully');
    }
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        $softwares = Software::get();

        return view('ticket.showClient', compact(['ticket','softwares']));
    }

    public function update(Request $request, Ticket $ticket)
    {
        // $this->authorize('update', $ticket);
        
        // $ticket = Ticket::find($id);
        // Different validation rules based on user role
        // if (Auth::user()->isClient()) {
            // Clients can only update basic information
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'systeme' => 'required|string|max:255',
                'software_id' => 'nullable|exists:softwares,id',
            ]);
        // } else {
        //     // Admins/devs can update everything
        //     $validated = $request->validate([
        //         'title' => 'sometimes|required|string|max:255',
        //         'description' => 'sometimes|required|string',
        //         'systeme' => 'sometimes|required|string|max:255',
        //         'software_id' => 'nullable|exists:softwares,id',
        //         'status' => 'sometimes|required|in:open,in_progress,resolved,closed',
        //         'priority' => 'sometimes|required|in:low,medium,high,urgent',
        //         'admin_id' => 'nullable|exists:users,id',
        //         'dev_id' => 'nullable|exists:users,id',
        //     ]);
        // }
        
        $ticket->update($validated);
        
        return redirect()->route('tickets.show', $ticket)
            ->with('success', 'Ticket updated successfully');
    }



    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);

        // if ($ticket->user_id !== Auth::id() ) {
        //     return redirect()->route('ticket.index')->with('error', 'Unauthorized');
        // }

        if ($ticket->isAssigned()) {
            return redirect()->back()->with('error', 'Cannot delete assigned ticket');
        }

        $ticket->delete();
        return redirect()->route('dashboard')->with('success', 'Ticket deleted successfully');
    }
}
