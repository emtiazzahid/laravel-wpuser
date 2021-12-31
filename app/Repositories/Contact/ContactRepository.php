<?php

namespace App\Repositories\Contact;

use App\Models\Contact;

class ContactRepository implements ContactInterface
{
    /**
     * @param $request
     * @return mixed
     */
    public function getContacts($request)
    {
        return Contact::orderBy('id', 'desc')
            ->paginate($request->perPage);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getContactById($id)
    {
        return Contact::find($id);
    }
}
