<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function loginForm()
    {
        return view('usuarios.login');
    }

    public function login(Request $request)
    {
        $validados = $this->validar();

        if ($validados) {
            session(['login' => 'true']);
        }

        return redirect('/')
            ->with('success', 'Logueado con éxito.');
    }

    public function logout()
    {
        session()->forget('login');

        return redirect('/')
            ->with('success', 'Deslogueado con éxito.');
    }

    private function findUsuario()
    {
        # code...
    }

    private function validar()
    {
        $validados = request()->validate([
            'username' => 'required|max:255|exists:users,name',
            'password' => 'required'
        ]);

        return $validados;
    }
}
