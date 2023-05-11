<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(protected Post $post)
    {
    }

    public function show($slug, $id)
    {
        $post = $this->post 
                    ->newQuery()
                    ->where('slug', $slug)
                    ->where('id', $id)
                    ->firstOrFail();

        return view('screens.client.single-post', compact('post'));
    }
}
