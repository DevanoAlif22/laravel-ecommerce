<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('cms.login');
    }

    public function loginAdmin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:15',
        ]);

        $infologin = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ];

        if (Auth::attempt($infologin)) {
            $user = Auth::user();
            if ($user->role == "1") {
                return redirect('/admin/dashboard');
            } else {
                Auth::logout(); // keluarin user yang role-nya tidak sesuai
                return redirect('/admin/login')->withErrors('You do not have permission to access the admin dashboard.');
            }
        } else {
            return redirect('/admin/login')->withErrors('The email or password you entered is incorrect. Please try again.');
        }
    }

    public function loginUser(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:15',
        ]);

        $infologin = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ];

        if (Auth::attempt($infologin)) {
            $user = Auth::user();
            if ($user->role == "2") {
                return redirect('/');
            } else {
                Auth::logout(); // keluarin user yang role-nya tidak sesuai
                return redirect('/login')->withErrors('Username atau password salah');
            }
        } else {
            return redirect('/login')->withErrors('Username atau password salah');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
    function logoutUser()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function registerForm()
    {
        return view('cms.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required|in:Male,Female',
            'birth' => 'nullable|date',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'contact' => 'nullable|string',
            'bill' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'role' => "2",
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'gender' => $validated['gender'],
            'birth' => $validated['birth'] ?? null,
            'address' => $validated['address'] ?? null,
            'city' => $validated['city'] ?? null,
            'contact' => $validated['contact'] ?? null,
            'bill' => $validated['contact'] ?? null,
        ]);


        Auth::login($user);

        return redirect('/')->with('success', 'Registration successful.');
    }
}
