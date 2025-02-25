<?php

namespace App\Http\Controllers;

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
                return view('client.index');
                break;
            case 'devlopper':
                return view('devlopper.index');
                break;
        }

    }
}
