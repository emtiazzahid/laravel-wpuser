<?php

namespace Tests\Feature;

use App\Http\Livewire\ContactTable;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class WPUserCreateTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_wp_user_create_from_app()
    {
        $this->actingAsUser();
        $this->withoutMiddleware();

        $contact = Contact::factory()->create();

        Setting::insert([
            ['key' => 'site_url', 'value' => 'http://www.7timer.info/'], // 7timer is an public api that provide numerical weather forcast. using it for test a http request
            ['key' => 'username', 'value' => $this->faker->userName()],
            ['key' => 'password', 'value' => $this->faker->password()]
        ]);

        Livewire::test(ContactTable::class)
            ->call('createWPAccount', $contact->id)
            ->assertHasNoErrors();
    }
}
