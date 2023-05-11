<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected Category $category)
    {
    }

    public function index()
    {
        $categories = $this->category
                        ->newQuery()
                        ->latest()
                        ->paginate(PAGE_SIZE_DEFAULT);

        return view('screens.admin.category.list', compact('categories'));
    }

    public function create()
    {
        return view('screens.admin.category.create');
    }

    public function store(CategoryRequest $request) 
    {
        $category = $this->category 
                        ->newQuery()
                        ->create(['name' => $request->name]);

        return to_route('admin.category.index')
                    ->with('success', 'Thêm danh mục thành công');
    }

    public function edit(Category $category) 
    {
        return view('screens.admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category) 
    {
        $category->update(['name' => $request->name]);

        return back()
                ->with('success', 'Cập nhật thành công');
    }

    public function destroy(Category $category) 
    {
        $category->delete();

        return back()
                ->with('success', 'Xóa danh mục thành công'); 
    }
}
