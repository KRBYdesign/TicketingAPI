<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function create(Request $request) : View
    {
        return view('new-ticket');
    }
}
