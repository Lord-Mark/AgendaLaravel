<?php

namespace App\Http\Controllers\agenda;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Exibe uma lista de contatos
     */
    public function index(): View
    {
        return view('agenda.contacts.index');
    }

    /**
     * Exibe um formulário para criar um novo contato
     */
    public function create(): View
    {
        return view('agenda.contacts.create');
    }

    /**
     * Insere no banco um contato criado
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        Contact::create($data);

        return redirect()->route('contacts.index')
            ->with('success', 'Contato criado com sucesso')
            ->setStatusCode(201);
    }

    /**
     * Exibe o contato especificado
     */
    public function show(string $id): View
    {
        return view('agenda.contacts.show');
    }

    /**
     * Exibe o formulário para editar o contato
     */
    public function edit(string $id): View
    {
        return view('agenda.contacts.edit');
    }

    /**
     * Atualiza o contato especificado no banco de dados
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->all();
        Contact::find($id)->update($data);

        return redirect()->route('contacts.index')
            ->setStatusCode(204, 'Contato atualizado com sucesso');
    }

    /**
     * Remove o contato especificado do banco de dados
     */
    public function destroy(string $id): RedirectResponse
    {
        $contact = Contact::find($id);

        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contato deletado com sucesso')
            ->setStatusCode(204);
    }
}
