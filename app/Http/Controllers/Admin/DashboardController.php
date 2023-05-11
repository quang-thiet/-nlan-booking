<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\TimeSlot;
use App\Models\TypeTicket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        protected Category $category,
        protected Ticket $ticket,
        protected TypeTicket $typeTicket, 
        protected TimeSlot $timeSlot
    )
    {
        
    }

    public function index()
    {
        $category_count = $this->category->count();
        $ticket_count = $this->ticket->count();
        $type_count = $this->typeTicket->count();
        $time_count = $this->timeSlot->count();

        return view('screens.admin.dashboard', compact('category_count', 'ticket_count', 'type_count', 'time_count'));
    }
}
