<?php

namespace Tests\Feature;

use App\Http\Livewire\Settings;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_validation_on_settings_data()
    {
        Livewire::test(Settings::class)
            ->call('update')
            ->assertHasErrors(['site_url', 'username', 'password']);
    }

    /**
     * @return void
     */
    public function test_user_can_submit_form()
    {
        $siteUrl = $this->faker->url();

        Livewire::test(Settings::class)
            ->set([
                'site_url' => $siteUrl,
                'username' => $this->faker->userName(),
                'password' => $this->faker->password()
            ])
            ->call('update')
            ->assertHasNoErrors(['site_url', 'username', 'password']);

        $this->assertEquals($siteUrl, Setting::where('key', 'site_url')->value('value'));
    }
}
