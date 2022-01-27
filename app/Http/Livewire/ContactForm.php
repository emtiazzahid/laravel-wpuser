<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Contact;

class ContactForm extends Component
{
    use LivewireAlert;

    public $name = '';
    public $phone_number = '';
    public $email = '';
    public $budget = '';
    public $message = '';

    public function render()
    {
        return view('components.contact-form');
    }

    public function contactStore()
    {
        $validatedDate = $this->validate([
            'name' => 'required|string|max:191',
            'phone_number' => 'required|max:50',
            'email' => 'required|email|unique:contacts,email',
            'budget' => 'required',
            'message' => 'nullable|string',
        ]);

        Contact::create($validatedDate);

        $this->resetInputFields();
        $this->alert('success', 'Contact stored successfully.');
    }

    /**
     * @var array
     */
    private function resetInputFields()
    {
        $this->reset(['name', 'phone_number', 'email', 'budget', 'message']);
    }
}
