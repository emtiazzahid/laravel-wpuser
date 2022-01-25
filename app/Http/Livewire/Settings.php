<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class Settings extends Component
{
    public function render()
    {
        return view('components.settings', [
            'settings' => Setting::get(),
        ]);
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