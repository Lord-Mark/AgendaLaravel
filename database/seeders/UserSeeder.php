<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Contact::factory()->for($user)->count(32)->create();
        }
        User::factory()->count(5)->create()->each(function ($user) {
            Contact::factory()->for($user)->count(32)->create();
        });
    }
}
