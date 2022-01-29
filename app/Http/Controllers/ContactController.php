<?php

namespace App\Http\Controllers;

use App\Models\Contact;

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
