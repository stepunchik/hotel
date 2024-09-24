<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{	
    public function register(Request $request)
    {
        $request->validate([
			'name' => 'required|max:255',
			'email' => 'required|email|unique:users',
			'login' => 'required|max:255|unique:users',
			'password' => 'required|confirmed',
		]);
		
		$user = User::create($request->all());
		
		$user->assignRole('user');

        return redirect()->route('home.index')->with('success', 'Регистрация успешно завершена');
    }
	
	public function login(Request $request) 
	{
		$credentials = $request->validate([
			'login' => 'required|max:255',
			'password' => 'required',
		]);
		
		if(Auth::attempt($credentials)) {
			$request->session()->regenerate();
			return redirect()->route('home.index')->with('success', 'Добро пожаловать, ' . Auth::user()->name . '!');
		}
		
		return back()->withErrors([
			'login' => 'Неверный логин или пароль.'
		]);
	}
	
	public function logout() 
	{
		Auth::logout();
		
		return back();
	}
}
