<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(protected Order $order)
    {
    }

    public function index()
    {
        $orders = $this->order
                    ->newQuery()
                    ->latest()
                    ->paginate(PAGE_SIZE_DEFAULT);
                    
        return view('screens.admin.order.list', compact('orders'));
    }
}
