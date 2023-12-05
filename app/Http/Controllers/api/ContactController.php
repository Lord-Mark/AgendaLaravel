<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use \Illuminate\Http\JsonResponse;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Como não tem necessidade de autenticação,
     * esta função irá listar todos os contatos existentes no banco utilizando um json
     */
    public function list(): JsonResponse
    {
        $contacts = Contact::all();

        return response()->json([
            'contacts' => $contacts
        ]);
    }

    public function show(string $id): JsonResponse
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json(['message' => 'Contato não encontrado'], 404);
        }
        return response()->json([
            'contact' => $contact
        ]);
    }
}
