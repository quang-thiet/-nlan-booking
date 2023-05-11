<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct(
        protected Author $author
    )
    {
    }

    public function index()
    {
        $authors = $this->author
                    ->newQuery()
                    ->latest()
                    ->get();

        return view('screens.client.author-list', compact('authors'));
    }
}
