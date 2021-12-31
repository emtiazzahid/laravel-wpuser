<?php

namespace App\Repositories\Contact;

interface ContactInterface
{
    public function getContacts($request);

    public function getContactById($id);
}
