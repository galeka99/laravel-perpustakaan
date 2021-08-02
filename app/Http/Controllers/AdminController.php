<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $username = $request->post('username');
        $password = Hash::make($request->post('password'));
        $name = $request->post('name');
        $email = $request->post('email');

        $admin = Admin::where('username', '=', $username)->first();
        if ($admin)
            return redirect('/login')->with('alert', 'danger')->with('message', 'Username sudah digunakan');

        $admin = new Admin([
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'email' => $email,
        ]);
        $admin->save();

        return redirect('/login')->with('alert', 'success')->with('message', 'Pendaftaran berhasil');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->post('username');
        $password = $request->post('password');

        $admin = Admin::where('username', '=', $username)->first();

        if (!$admin)
            return redirect('/login')->with('alert', 'danger')->with('message', 'User tidak ditemukan');
            
        if (!Hash::check($password, $admin->password))
            return redirect('/login')->with('alert', 'danger')->with('message', 'Kata sandi salah');
        
        Auth::login($admin, true);
        return redirect('/peminjam');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('alert', 'success')->with('message', 'Berhasil keluar');
    }
}
