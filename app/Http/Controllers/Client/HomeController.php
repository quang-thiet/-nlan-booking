<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Post;
use App\Models\Slide;
use App\Models\Ticket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        protected Ticket $ticket, 
        protected Author $author,
        protected Slide $slide,
        protected Post $post
    )
    {
    }

    public function index()
    {
        $tickets = $this->ticket 
                    ->newQuery()
                    ->latest()
                    ->limit(3)
                    ->get();

        $authors = $this->author
                    ->newQuery()
                    ->latest()
                    ->limit(10)
                    ->get();

        $slides = $this->slide 
                    ->newQuery()
                    ->latest()
                    ->get();

        $posts = $this->post 
                    ->newQuery()
                    ->latest()
                    ->limit(3)
                    ->get();

        return view('screens.client.home', compact('tickets', 'authors', 'slides', 'posts'));
    }

    public function about()
    {
        return view('screens.client.about');
    }
}
