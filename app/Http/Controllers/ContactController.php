<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repositories\Contact\ContactInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.contacts');
    }
}