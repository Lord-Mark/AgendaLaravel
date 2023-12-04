<?php

namespace App\Http\Controllers\agenda;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('valid.contact.id')
            ->only(['show', 'edit', 'update', 'destroy']);
    }

    /**
     * Exibe uma lista de contatos
     */
    public function index(): View
    {
        $contacts = auth()->user()->contacts()->simplePaginate(5);
        return view('agenda.contacts.index', compact('contacts'));
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
        $data['user_id'] = auth()->user()->id;
        Contact::create($data);

        return redirect()->route('contacts.index')
            ->with('success', 'Contato criado com sucesso');
    }

    /**
     * Exibe o contato especificado
     */
    public function show(string $id): View|RedirectResponse
    {
        $contact = Contact::find($id);
        return view('agenda.contacts.show', compact('contact'));
    }

    /**
     * Exibe o formulário para editar o contato
     */
    public function edit(string $id): View
    {
        $contact = Contact::find($id);
        return view('agenda.contacts.edit', compact('contact'));
    }

    /**
     * Atualiza o contato especificado no banco de dados
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->all();
        Contact::find($id)->update($data);

        return redirect()->route('contacts.index')
            ->with('success', 'Contato atualizado com sucesso');
    }

    /**
     * Remove o contato especificado do banco de dados
     */
    public function destroy(string $id): RedirectResponse
    {
        $contact = Contact::find($id);

        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contato deletado com sucesso');
    }

    /**
     * Busca os contatos
     */
    public function search(Request $request): View
    {
        $contacts = auth()->user()->contacts()->where('name', 'like', '%' . $request->search . '%')->simplePaginate(5);

        return view('agenda.contacts.result', compact('contacts'));
    }
}
