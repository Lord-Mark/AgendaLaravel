<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function test_the_api_return_the_list_of_contacts(): void
    {
        $user = User::factory()->create();
        $contacts = Contact::factory()->count(10)->for($user)->create();

        $response = $this->get('/api/contacts');

        $response->assertStatus(200)->assertJsonCount(10, 'contacts');
    }

    public function test_the_api_return_a_specific_contact(): void
    {
        $user = User::factory()->create();
        $contact_to_be_found = Contact::factory()->for($user)->create();

        // Cria 10 contatos além do contato a ser buscado
        Contact::factory()->count(10)->for($user)->create();


        $response = $this->get("/api/contacts/{$contact_to_be_found->id}");

        $response->assertStatus(200)->assertJson([
            'contact' => $contact_to_be_found->toArray()
        ]);
    }
}
