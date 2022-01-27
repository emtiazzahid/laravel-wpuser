<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Repositories\Contact\ContactInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.contacts');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.contact', [
            'contact' => $contact
        ]);
    }
}
