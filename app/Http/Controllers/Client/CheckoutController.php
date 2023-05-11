<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct(
        protected Ticket $ticket,
        protected Order $order
    )
    {
    }

    public function index(Request $request)
    {
        $ticket = $this->ticket 
                    ->newQuery()
                    ->findOrFail($request->ticket_id);

        $ticket->load(['times', 'types']);

        return view('screens.client.confirm', compact('ticket'));
    }

    public function store(Request $request)
    {
        $ticket = $this->ticket 
                        ->newQuery()
                        ->findOrFail($request->ticket_id)
                        ->load(['types', 'times']);

        $data = $request->only([
            'fullname',
            'phone',
            'ticket_id'
        ]);

        $data['code'] = generate_order_code();

        $data['detail'] = json_encode([
            'Khung giờ' => $ticket->times->find($request->time)->time,
            'Loại vé' => "{$ticket->types->find($request->type)->name}",
            'Giá tiền' => "{$ticket->types->find($request->type)->pivot->price}"
        ]);

        $order = $this->order 
                    ->newQuery()
                    ->create($data);

        return to_route('checkout.success', $order->code);
    }

    public function confirmSuccess($code) 
    {
        $order = $this->order
                    ->newQuery() 
                    ->where('code', $code)
                    ->firstOrFail();

        return view('screens.client.confirm-success', compact('order'));
    }
}
