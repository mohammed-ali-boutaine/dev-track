<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Ticket;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    function index(){

        // $role = Auth::role();
        $user = Auth::user();
        
        $role = $user['role'];

        switch ($role){
            case 'admin':
                return view('admin.index');
                break;
            case 'client':
                $clientId = Auth::id();
                $client = Client::find($clientId);
                $tickets = $client->tickets;
                $softwares = Software::get();

                return view('client.index',compact(['tickets','softwares']));
                break;
            case 'devlopper':
                return view('devlopper.index');
                break;
        }

    }
}
