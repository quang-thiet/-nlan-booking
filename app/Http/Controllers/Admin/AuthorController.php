<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Services\UploadService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct(
        protected Author $author
    ) {
    }

    public function index()
    {
        $authors = $this->author
            ->newQuery()
            ->latest()
            ->paginate(PAGE_SIZE_DEFAULT);

        return view('screens.admin.author.list', compact('authors'));
    }

    public function create()
    {
        return view('screens.admin.author.create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'image' => UploadService::upload($request->image, 'author')
        ];

        $author = $this->author
            ->newQuery()
            ->create($data);

        return to_route('admin.author.index')
            ->with('success', 'Thêm thành công');
    }

    public function edit(Author $author)
    {
        return view('screens.admin.author.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $data = $request->only('name');

        if ($request->has('image')) {
            $data['image'] = UploadService::upload($request->image, 'author');
        }

        $author->update($data);

        return back()
            ->with('success', 'Cập nhật thành công');
    }

    public function destroy(Author $author) 
    {
        $author->delete();

        return back()->with('success', 'Xóa thành công');
    }
}
