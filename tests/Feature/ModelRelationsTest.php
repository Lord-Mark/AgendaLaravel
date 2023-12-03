<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class ModelRelationsTest extends TestCase
{
    use DatabaseMigrations;
    
    /**
     * Verifica se o relacionamento entre User e Contact está correto
     */
    public function test_if_user_has_many_contacts(): void
    {
        // Utiliza factories para criar um usuário e dois contatos atribuidos a esse user
        $user = User::factory()->create();
        Contact::factory()->create(['user_id' => $user->id]);
        Contact::factory()->create(['user_id' => $user->id]);
        
        // cria outro usuário e atribui um contato a ele
        Contact::factory()->create(['user_id' => User::factory()->create()->id]);
        
        // Obtém o relacionamento entre User e Contact
        $relation = $user->contacts();
        $this->assertInstanceOf(HasMany::class, $relation);

        // Verifica se as chaves estão corretas
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());

        // três contatos foram criados, mas apenas dois pertencem a este usuário
        $this->assertEquals(2, $user->contacts->count());
    }
    
    /**
     * Verifica se o relacionamento entre Contact e User está correto
     */

    public function test_if_contact_belongs_to_user(): void
    {
        // Cria um usuário
        $user = User::factory()->create();

        // Cria um contato associado ao usuário
        $contact = Contact::factory()->create(['user_id' => $user->id]);

        // Obtém o usuário associado ao contato
        $userFromContact = $contact->user;

        // Verifica se o contato pertence ao usuário correto
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($user->id, $userFromContact->id);

        // Verifica se o relacionamento está correto
        $this->assertInstanceOf(BelongsTo::class, $contact->user());
    }

}
