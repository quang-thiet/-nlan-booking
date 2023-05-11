<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\UploadService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(protected Post $post)
    {
    }

    public function index()
    {
        $posts = $this->post 
                    ->newQuery()
                    ->latest()
                    ->paginate(PAGE_SIZE_DEFAULT);

        return view('screens.admin.post.list', compact('posts'));
    }

    public function create()
    {
        return view('screens.admin.post.create');
    }

    public function store(PostRequest $request) 
    {
        $data = $request->only([
            'title',
            'description',
            'content'
        ]);

        $data['thumbnail'] = UploadService::upload($request->thumbnail, 'post');

        $post = $this->post  
                    ->newQuery()
                    ->create($data);

        return to_route('admin.post.index')
                    ->with('success', 'Thêm bài viết thành công');
    }

    public function edit(Post $post) 
    {
        return view('screens.admin.post.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $data = $request->only([
            'title',
            'description',
            'content'
        ]);

        if ($request->has('thumbnail')) {
            $data['thumbnail'] = UploadService::upload($request->thumbnail, 'post');
        }

        $post->update($data);

        return back()
                ->with('success', 'Cập nhật thành công');
    }

    public function destroy(Post $post) 
    {
        $post->delete();

        return back()
                ->with('success', 'Xóa thành công');
    }
}
