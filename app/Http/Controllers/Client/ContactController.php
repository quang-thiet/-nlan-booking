<?php

namespace App\Http\Controllers\Client;

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
        return view('screens.client.contact');
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'fullname',
            'email',
            'message'
        ]);

        $contact = $this->contact
                    ->newQuery()
                    ->create($data);

        return back()
                ->with('success', 'Gửi liên hệ thành công');
    }
}
