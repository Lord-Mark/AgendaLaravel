<?php

namespace App\Http\Middleware;

use App\Models\Contact;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateContactId
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $contactId = $request->route('contact');
        // Se não encontrar o contato retorna para index com 404
        if (!Contact::find($contactId)) {
            return redirect()->route('contacts.index')
                ->with('error', 'Contato não encontrado')
                ->setStatusCode(404);
        }
        return $next($request);
    }
}
