<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ContactTable extends Component
{
    use WithPagination, LivewireAlert;

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

    /**
     * @param $id
     */
    public function createWPAccount($id)
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        if (!isset($settings['site_url']) || !isset($settings['username']) || !isset($settings['password'])) {
            return $this->alert('warning',  'Missing WP site settings');
        }

        $contact = Contact::findOrFail($id);

        $response = Http::withBasicAuth($settings['username'], $settings['password'])->post($this->getBaseUrl($settings['site_url']) . 'customers', [
            'name' => $contact->name,
            'phone' => $contact->phone_number,
            'email' => $contact->email,
            'budget' => $contact->budget,
            'message' => $contact->message,
            'source' => route('contacts.show', ['id' => $id])
        ]);

        if ($response->successful()) {
            $contact->update(['is_wp_synced' => 1]);
            $this->alert('success', 'Data sync successfull');
        } else {
            $body = json_decode($response->body(), true);
            $this->alert('warning',  'Something wrong happened. Please try again. DETAIL: ' . $body['message']);
        }
    }

    public function openViewModal()
    {
        $this->dispatchBrowserEvent('openContactViewModal');
    }

    public function closeViewModal()
    {
        $this->dispatchBrowserEvent('closeContactViewModal');
    }

    private function getBaseUrl($fullUrl)
    {
        $url_info = parse_url($fullUrl);
        return $url_info['scheme'] . '://' . $url_info['host'] . '/wp-json/wlu/v1/';
    }
}
