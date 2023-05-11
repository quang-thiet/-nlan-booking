<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\TimeSlot;
use App\Models\TypeTicket;
use App\Services\UploadService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{
    public function __construct(
        protected Ticket $ticket,
        protected TimeSlot $timeSlot,
        protected TypeTicket $typeTicket,
        protected Category $category
    ) {
    }

    public function index()
    {
        $tickets = $this->ticket
            ->newQuery()
            ->latest()
            ->paginate(PAGE_SIZE_DEFAULT);

        return view('screens.admin.ticket.list', compact('tickets'));
    }

    public function create()
    {
        $times = $this->timeSlot
            ->newQuery()
            ->latest()
            ->get();

        $types = $this->typeTicket
            ->newQuery()
            ->latest()
            ->get();

        $categories = $this->category
            ->newQuery()
            ->latest()
            ->get();

        return view('screens.admin.ticket.create', compact('times', 'types', 'categories'));
    }

    public function store(TicketRequest $request)
    {
        $data = $request->only([
            'name',
            'description',
            'content',
            'category_id'
        ]);

        $data['thumbnail'] = UploadService::upload($request->thumbnail, 'ticket');

        $types = array_filter($request->types);

        DB::beginTransaction();

        try {
            $ticket = $this->ticket
                ->newQuery()
                ->create($data);

            $ticket->times()->attach($request->times);

            collect($types)->each(function ($type, $key) use ($ticket) {
                $ticket->types()->attach($key, ['price' => $type]);
            });

            DB::commit();

            return to_route('admin.ticket.index')
                ->with('success', 'Thêm thành công');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra, vui lòng thử lại');
        }
    }

    public function edit(Ticket $ticket)
    {
        $times = $this->timeSlot
            ->newQuery()
            ->latest()
            ->get();

        $types = $this->typeTicket
            ->newQuery()
            ->latest()
            ->get();

        $categories = $this->category
            ->newQuery()
            ->latest()
            ->get();

        $ticket->load(['times', 'types', 'category']);

        return view('screens.admin.ticket.edit', compact('times', 'types', 'ticket', 'categories'));
    }

    public function update(TicketRequest $request, Ticket $ticket)
    {
        $data = $request->only([
            'name',
            'description',
            'content',
            'category_id'
        ]);

        if ($request->has('thumbnail')) {
            $data['thumbnail'] = UploadService::upload($request->thumbnail, 'ticket');
        }

        $types = array_filter($request->types);

        DB::beginTransaction();

        try {
            $ticket->update($data);

            $ticket->times()->sync($request->times);

            $arrTypes = collect($types)->transform(function($type, $key) {
                return [
                    'price' => $type,
                    'type_id' => $key
                ];
            })->keyBy('type_id');

            $ticket->types()->sync($arrTypes);

            DB::commit();

            return back()
                ->with('success', 'Cập thành công');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra, vui lòng thử lại');
        }
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return back()
            ->with('success', 'Xóa thành công');
    }
}
