<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactTable extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;

    public $contact = null;

    public function render()
    {
        return view('components.contact-table', [
            'contacts' => Contact::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
        ]);
    }

    public function view($id)
    {
        $this->contact = Contact::findOrFail($id);
        $this->openViewModal();
    }

    public function openViewModal()
    {
        $this->dispatchBrowserEvent('openContactViewModal');
    }
    public function closeViewModal()
    {
        $this->dispatchBrowserEvent('closeContactViewModal');
    }
}