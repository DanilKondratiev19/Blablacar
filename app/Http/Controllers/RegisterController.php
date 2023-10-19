<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rules\Password;

use Illuminate\Validation\ValidationException;
use Illuminate\Database\UniqueConstraintViolationException;

class RegisterController extends Controller
{
    protected $redirectTo = '/';
    public function showEmailForm(Request $request)
{
    $email = $request->input('email');

    // Сохраните значение в сессии
    $request->session()->put('registration_email', $email);
    return redirect()->route('register.name')->with(compact('email'));
   // return view('auth.name', compact('email'));
    
}

public function showNameForm(Request $request)
{
    $customMessages = [
        'name.regex' => 'Имя должно содержать только буквы и пробелы.',
        'name.max' => 'Имя не может превышать 70 символов.',
        'name.required' => 'Поле "Имя" обязательно для заполнения.',
    ];

    $validated = $request->validate([
        'name' => ['required', 'regex:/^[\p{Cyrillic}\s]+$/u', 'max:70'],
    ], $customMessages);

    $name = $request->input('name');

    // Если валидация прошла успешно, сохраните имя в сессии
    $request->session()->put('registration_name', $name);
    return redirect()->route('register.password')->with(compact('name'));
   // return view('auth.password', compact('name'));
    
}



public function register(Request $request)
{
    $validated = $request->validate([
        'password' => ['required', Password::min(8)],
    ], [
        'password.required' => 'Поле "Пароль" обязательно для заполнения.',
        'password.min' => 'Пароль должен содержать минимум 8 символов.',
    ]);
    $password = $request->input('password');
    $request->session()->put('registration_password', $password);
    $email = $request->session()->get('registration_email');
    $name = $request->session()->get('registration_name');
    
    $existingUser = User::where('email', $email)->first();

    if ($existingUser) {
        return redirect()->route('auth.failed');
    }

    $user = new User([
        'email' => $email,
        'name' => $name,
        'password' => Hash::make($request->session()->get('registration_password')),
    ]);
    

    // Сохранение пользователя в базе данных
    $user->save();
    $request->session()->forget('registration_name');
    $request->session()->forget('registration_email');
    $request->session()->forget('registration_password');

    // Перенаправление пользователя
    return redirect()->route('loggedout');
}
    
public function registrationFailed()
{
    return view('auth.failed');
}

public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

             return redirect()->route('home');
        }

        return back()->withErrors([
            'password' => 'Предоставленные учетные данные не соответствуют нашим записям',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }

}
