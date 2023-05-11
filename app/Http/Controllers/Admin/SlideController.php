<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Models\Slide;
use App\Services\UploadService;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function __construct(
        protected Slide $slide
    )
    {
    }

    public function index()
    {
        $slides = $this->slide 
                    ->newQuery()
                    ->latest()
                    ->paginate(PAGE_SIZE_DEFAULT);

        return view('screens.admin.slide.list', compact('slides'));
    }

    public function create()
    {
        return view('screens.admin.slide.create');
    }

    public function store(SlideRequest $request) 
    {
        $data = $request->only('url');

        $data['path'] = UploadService::upload($request->slide, 'slide');

        $slide = $this->slide 
                    ->newQuery()
                    ->create($data);

        return to_route('admin.slide.index')
                ->with('success', 'Thêm thành công');
    }

    public function edit(Slide $slide) 
    {
        return view('screens.admin.slide.edit', compact('slide'));
    }

    public function update(SlideRequest $request, Slide $slide)
    {
        $data = $request->only('url');

        if ($request->has('slide')) {
            $data['path'] = UploadService::upload($request->slide, 'slide');
        }

        $slide->update($data);

        return back()
                ->with('success', 'Cập nhật thành công');
    }

    public function destroy(Slide $slide)
    {
        $slide->delete();

        return back()
                ->with('success', 'Xóa thành công');
    }
}
