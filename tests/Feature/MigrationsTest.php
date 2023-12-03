<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MigrationsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Verifica se a tabela users foi criada corretamente
     */
    public function test_if_the_users_table_and_columns_were_created(): void
    {
        // Verifica se a tabela users foi criada
        $this->assertTrue(Schema::hasTable('users'));

        // Verifica se as colunas de users foram criadas adequadamente
        $this->assertTrue(Schema::hasColumns('users', [
            'id',
            'name',
            'email',
            'email_verified_at',
            'password',
            'created_at',
            'updated_at',
        ]));
    }

    /**
     * Testa se a tabela contacts foi criada corretamente
     */
    public function test_if_the_contacts_table_and_columns_were_created(): void
    {
        // Verifica se a tabela contacts foi criada
        $this->assertTrue(Schema::hasTable('contacts'));

        // Verifica se as colunas de contacts foram criadas adequadamente
        $this->assertTrue(Schema::hasColumns('contacts', [
            'id',
            'name',
            'phone',
            'email',
            'user_id',
            'zip_code', // CEP
            'street',
            'st_number',
            'complement',
            'neighborhood',
            'city',
            'state',
            'note',
            'created_at',
            'updated_at',
        ]));
    }
}
