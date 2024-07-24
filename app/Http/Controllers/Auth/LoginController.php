<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Redirige a la lista de tareas después del login
    protected $redirectTo = '/tasks';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // Muestra el formulario de inicio de sesión
    public function showLoginForm(Request $request)
    {
        $userId = $request->input('user_id');
        $action = $request->input('action', 'login'); // Default to 'login' if not set
        return view('auth.login', compact('userId', 'action'));
    }

    // Maneja la autenticación del usuario
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Check if action is 'view' or 'login'
            $action = $request->input('action', 'login');
            if ($action === 'view') {
                return redirect()->route('users.show', $request->input('user_id'));
            }
            return redirect()->route('tasks.index');
        }

        return redirect()->route('login')
                         ->withErrors(['email' => 'Credenciales incorrectas.'])
                         ->withInput();
    }
}

