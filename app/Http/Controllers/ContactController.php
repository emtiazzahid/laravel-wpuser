<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repositories\Contact\ContactInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contact;

    public function __construct(ContactInterface $contact){
        $this->contact = $contact;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return view('contacts', [
            'contacts' => $this->contact->getContacts($request)
        ]);
    }


    public function store(ContactRequest $request)
    {

    }
}
