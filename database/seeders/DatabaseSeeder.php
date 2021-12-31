<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@mail.com',
             'password' => bcrypt('password'),
             'email_verified_at' => now(),
             'remember_token' => Str::random(10),
         ]);

         Contact::factory(10)->create();
    }
}
