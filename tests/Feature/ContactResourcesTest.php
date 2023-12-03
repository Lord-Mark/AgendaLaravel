<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Contact;
use Tests\TestCase;

class ContactResourcesTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Verifica se a rota de listagem de contatos está ok
     *
     * @test
     */
    public function test_contact_index_route_is_ok()
    {
        $response = $this->get(route('contacts.index'));

        $response->assertOk();
    }

    /**
     * Verifica se a rota de exibição de contato está ok
     *
     * @test
     */
    public function test_contact_show_route_is_ok()
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->for($user)->create();

        $response = $this->get(route('contacts.show', ['contact' => $contact->id]));

        $response->assertOk();
    }

    /**
     * Verifica se o contato pode ser criado através da rota
     *
     * @test
     */
    public function test_can_create_contact()
    {
        $user = User::factory()->create();
        $contactData = [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'zip_code' => fake()->randomNumber(8, true),
            'street' => fake()->streetName(),
            'st_number' => fake()->buildingNumber(),
            'complement' => fake()->word(),
            'neighborhood' => fake()->word(),
            'city' => fake()->city(),
            'state' => fake()->city(),
            'note' => fake()->sentence(),
            'user_id' => $user->id,
        ];

        $response = $this->post(route('contacts.store'), $contactData);

        $response->assertCreated();

        $this->assertDatabaseHas('contacts', $contactData);
    }


    /**
     * Verifica se é possível atualizar um contato através da rota
     *
     * @test
     */
    public function test_can_update_contact()
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->for($user)->create();
        $updatedData = [
            'name' => 'Updated Name',
        ];

        $response = $this->put(route('contacts.update', ['contact' => $contact->id]), $updatedData);

        // Verifica se o status-code retornado é 204 (No Content) → sucesso
        $response->assertNoContent();

        $changedContact = Contact::find($contact->id);
        $diff = array_diff($contact->toArray(), $changedContact->toArray());

        // Verifica se apenas um campo foi alterado
        $this->assertCount(1, $diff);
    }

    /**
     * Verifica se é possível deletar um contato através da rota
     *
     * @test
     */
    public function test_can_delete_contact()
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->for($user)->create();

        $response = $this->delete(route('contacts.destroy', ['contact' => $contact->id]));

        $response->assertNoContent();
    }

    //////////// A partir deste ponto os testes serão para casos que devem dar erro ////////////

    /**
     *  Show não encontrou o id do contato
     */
    public function test_contact_routes_user_not_found()
    {
        // Cria um ID de contato que não existe
        $nonExistentContactId = 9999;

        // Faz uma requisição GET para a rota de exibição de contatos com um ID inválido
        $responseShow = $this->get(route('contacts.show', ['contact' => $nonExistentContactId]));

        // Faz uma requisição GET para a rota de edição de contatos com um ID inválido
        $responseEdit = $this->get(route('contacts.edit', ['contact' => $nonExistentContactId]));

        // Faz uma requisição PUT para a rota de atualização de contatos com um ID inválido
        $responseUpdate = $this->put(route('contacts.update', ['contact' => $nonExistentContactId]));

        // Faz uma requisição DELETE para a rota de atualização de contatos com um ID inválido
        $responseDelete = $this->delete(route('contacts.destroy', ['contact' => $nonExistentContactId]));

        // Verifica se as respostas tem o status 404 (Not Found)
        $responseShow->assertNotFound();
        $responseEdit->assertNotFound();
        $responseUpdate->assertNotFound();
        $responseDelete->assertNotFound();

    }
}
