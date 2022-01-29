<?php

namespace Tests\Feature;

use App\Http\Livewire\ContactForm;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_validation_on_contact_form()
    {
        Livewire::test(ContactForm::class)
            ->call('contactStore')
            ->assertHasErrors(['name', 'phone_number', 'email', 'budget']);
    }

     /**
     * @return void
     */
    public function test_duplicate_email_validation()
    {
        $email = $this->faker->email();
        Livewire::test(ContactForm::class)
            ->set([
                'name' => $this->faker->name,
                'phone_number' => $this->faker->phoneNumber(),
                'email' => $email,
                'budget' => $this->faker->randomNumber(),
                'message' => $this->faker->sentence(rand(5,10))
            ])
            ->call('contactStore');

        Livewire::test(ContactForm::class)
            ->set([
                'name' => $this->faker->name,
                'phone_number' => $this->faker->phoneNumber(),
                'email' => $email,
                'budget' => $this->faker->randomNumber(),
                'message' => $this->faker->sentence(rand(5,10))
            ])
            ->call('contactStore')
            ->assertHasErrors(['email']);
    }


    /**
     * @return void
     */
    public function test_user_can_submit_form()
    {
        $name = $this->faker->name;
        Livewire::test(ContactForm::class)
            ->set([
                'name' => $name,
                'phone_number' => $this->faker->phoneNumber(),
                'email' => $this->faker->email(),
                'budget' => $this->faker->randomNumber(),
                'message' => $this->faker->sentence(rand(5,10))
            ])
            ->call('contactStore')
            ->assertHasNoErrors(['name', 'phone_number', 'email', 'budget', 'message']);

        $this->assertTrue(Contact::whereName($name)->exists());
    }
}
