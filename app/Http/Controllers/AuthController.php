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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'address' => 'required|string',
            'phone' => 'required|numeric',
        ]);
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'role_id' => 2,
        ]);
        $user->save();
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            notify()->success('Welcome to Ecommerce⚡️');
            $userRole = auth()->user()->role_id;
            if ($userRole == 1) {
                return redirect()->route('admin.dashboard');
            } else if ($userRole == 2) {
                return redirect()->route('home');
            }
        }
        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function adminProfile()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }
    public function adminProfileUpdate(Request $request)
    {
        $user = auth()->user();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,

        ]);
        $user->update($validatedData);
        notify()->success('Successfully update ');
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
    }
}
