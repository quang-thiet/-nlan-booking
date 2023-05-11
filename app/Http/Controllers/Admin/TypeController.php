<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use App\Models\TypeTicket;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function __construct(protected TypeTicket $typeTicket)
    {
    }

    public function index()
    {
        $types = $this->typeTicket
                        ->newQuery()
                        ->latest()
                        ->paginate(PAGE_SIZE_DEFAULT);

        return view('screens.admin.type.list', compact('types'));
    }

    public function create()
    {
        return view('screens.admin.type.create');
    }

    public function store(TypeRequest $request) 
    {
        $type = $this->typeTicket 
                        ->newQuery()
                        ->create(['name' => $request->name]);

        return to_route('admin.type.index')
                    ->with('success', 'Thêm thành công');
    }

    public function edit(TypeTicket $type) 
    {
        return view('screens.admin.type.edit', compact('type'));
    }

    public function update(TypeRequest $request, TypeTicket $type) 
    {
        $type->update(['name' => $request->name]);

        return back()
                ->with('success', 'Cập nhật thành công');
    }

    public function destroy(TypeTicket $type) 
    {
        $type->delete();

        return back()
                ->with('success', 'Xóa thành công'); 
    }
}
