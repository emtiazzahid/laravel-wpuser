<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Illuminate\Support\Arr;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Settings extends Component
{
    use LivewireAlert;

    public $site_url = '';
    public $username = '';
    public $password = '';

    public function mount()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $this->site_url = Arr::get($settings,'site_url');
        $this->username = Arr::get($settings,'username');
    }

    public function render()
    {
        return view('components.settings');
    }

    /**
     * @var array
     */
    private function resetInputFields()
    {
        $this->reset(['site_url', 'username', 'password']);
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'site_url' => 'required|url',
            'username' => 'required|string|max:191',
            'password' => 'required',
        ]);

        foreach($validatedDate as $key => $item) {
            $setting = Setting::firstOrNew(['key' => $key]);
            $setting->value = $item;
            $setting->save();
        }

        $this->alert('success', 'Settings Updated Successfully.');
    }
}
