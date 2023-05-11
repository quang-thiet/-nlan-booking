<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct(
        protected Ticket $ticket
    )
    {
    }

    public function index()
    {
        $tickets = $this->ticket
                ->newQuery()
                ->latest()
                ->get();

        return view('screens.client.list-grid', compact('tickets'));
    }

    public function index2()
    {
        $tickets = $this->ticket
                ->newQuery()
                ->latest()
                ->get(); 

        return view('screens.client.item-list', compact('tickets'));
    }

    public function show($slug, $id) 
    {
        $ticket = $this->ticket
                    ->newQuery() 
                    ->where('slug', $slug)
                    ->where('id', $id)
                    ->firstOrFail();
        
        $ticket->load(['types', 'times']);

        return view('screens.client.ticket-detail', compact('ticket'));
    }
}
