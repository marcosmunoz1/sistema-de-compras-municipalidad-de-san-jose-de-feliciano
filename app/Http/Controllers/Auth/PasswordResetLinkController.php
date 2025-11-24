<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Mensajes personalizados
        $mensajes = [
            Password::RESET_LINK_SENT => 'Te enviamos un enlace para restablecer tu contraseña. Revisá tu correo.',
            Password::INVALID_USER    => 'No encontramos un usuario con ese correo.',
            Password::RESET_THROTTLED => 'Demasiados intentos. Probá de nuevo en un momento.',
        ];

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', $mensajes[$status]);
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => $mensajes[$status] ?? 'No se pudo procesar la solicitud.']);
    }


}
