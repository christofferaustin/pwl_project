<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Gunakan $request->validate langsung untuk standarisasi aplikasi web Laravel
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,dosen,mahasiswa',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        // Redirect ke root atau halaman utama setelah register
        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Pengkondisian redirect berdasarkan hak akses role user
            if (Auth::user()->role == 'admin') {
                return redirect('/');
            }
            if (Auth::user()->role == 'dosen') {
                return redirect()->route('dashboard');
            }
            if (Auth::user()->role == 'mahasiswa') {
                return redirect()->route('dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Amankan arah balik ke form login setelah keluar
    }

    public function registerView()
    {
        return view('auth.register'); // Sebaiknya kumpulkan file auth di dalam folder tersendiri
    }

    public function loginView()
    {
        return view('auth.login');
    }
}