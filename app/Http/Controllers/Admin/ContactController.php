<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(protected Contact $contact)
    {
    }

    public function index() 
    {
        $contacts = $this->contact
                        ->newQuery()
                        ->latest()
                        ->paginate(PAGE_SIZE_DEFAULT);

        return view('screens.admin.contact.list', compact('contacts'));
    }
}
