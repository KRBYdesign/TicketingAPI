<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function create(Request $request) : View
    {
        $data = [];
        // get up to 5 tickets created by the user
        $data['tickets'] = Ticket::fakeArray(5);

        // get any notifications the user has

        return view('dashboard')
            ->with('data', $data);
    }
}
