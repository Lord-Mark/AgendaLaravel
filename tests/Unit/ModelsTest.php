<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Contact;
use App\Models\User;

class ModelsTest extends TestCase
{

    /**
     * Verifica se apenas os campos certos de users estão como fillable
     */
    public function test_if_users_fillable_is_correct(): void
    {
        $user = new User();

        $expected = [
            'name',
            'email',
            'password'
        ];

        $this->assertCount(0, array_diff($expected, $user->getFillable()));
    }

    /**
     * Verifica se apenas os campos certos de contacts estão como fillable
     */
    public function test_if_contacts_fillable_is_correct(): void
    {
        $contact = new Contact();

        $expected = [
            'name',
            'phone',
            'email',
            'user_id',
            'zip_code',
            'street',
            'st_number',
            'complement',
            'neighborhood',
            'city',
            'state',
            'note',
        ];

        $this->assertCount(0, array_diff($expected, $contact->getFillable()));
    }

}
