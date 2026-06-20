<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class EmployeeAuthController extends Controller
{
    public function showSignUp(): View|RedirectResponse
    {
        if (Auth::check() && ! Auth::user()->is_super_admin) {
            return redirect()->route('employee.dashboard');
        }

        return view('employee.auth.sign-up');
    }

    public function signUp(Request $request): RedirectResponse
    {
        if (Auth::check() && ! Auth::user()->is_super_admin) {
            return redirect()->route('employee.dashboard');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $employee = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_super_admin' => false,
        ]);

        Auth::login($employee);
        $request->session()->regenerate();

        return redirect()
            ->route('employee.dashboard')
            ->with('status', 'Employee account created successfully.');
    }

    public function showSignIn(): View|RedirectResponse
    {
        if (Auth::check() && ! Auth::user()->is_super_admin) {
            return redirect()->route('employee.dashboard');
        }

        return view('employee.auth.sign-in');
    }

    public function signIn(Request $request): RedirectResponse
    {
        if (Auth::check() && ! Auth::user()->is_super_admin) {
            return redirect()->route('employee.dashboard');
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        if (Auth::user()->is_super_admin) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()
                ->withErrors([
                    'email' => 'This sign-in page is for employee accounts only.',
                ])
                ->onlyInput('email');
        }

        return redirect()
            ->route('employee.dashboard')
            ->with('status', 'Welcome back.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('employee.sign-in')
            ->with('status', 'You have been signed out successfully.');
    }
}
