<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimeRequest;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function __construct(
        protected TimeSlot $timeSlot
    )
    {   
    }

    public function index()
    {
        $times = $this->timeSlot
                    ->newQuery()
                    ->latest()
                    ->paginate(PAGE_SIZE_DEFAULT);

        return view('screens.admin.time-slot.list', compact('times'));
    }

    public function create()
    {
        return view('screens.admin.time-slot.create');
    }

    public function store(TimeRequest $request) 
    {
        $time = $this->timeSlot 
                        ->newQuery()
                        ->create(['time' => $request->time]);

        return to_route('admin.time-slot.index')
                    ->with('success', 'Thêm thành công');
    }

    public function edit(TimeSlot $time_slot) 
    {
        return view('screens.admin.time-slot.edit', compact('time_slot'));
    }

    public function update(TimeRequest $request, TimeSlot $time_slot) 
    {
        $time_slot->update(['time' => $request->time]);

        return back()
                ->with('success', 'Cập nhật thành công');
    }

    public function destroy(TimeSlot $time_slot) 
    {
        $time_slot->delete();

        return back()
                ->with('success', 'Xóa thành công'); 
    }
}
