<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Валидация данных
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Попытка аутентификации
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Проверяем роль пользователя
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Перенаправление на админскую панель
            }

            // Если не админ, перенаправляем на обычную страницу
            return redirect()->intended('/');
        }

        // Если авторизация не удалась, возвращаем обратно с ошибкой
        return back()->withErrors([
            'email' => 'Неверные учетные данные.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Перенаправляем на главную страницу
    }
    // Метод для отображения формы входа
    public function showLoginForm()
    {
        return view('auth.login');
    }
}

