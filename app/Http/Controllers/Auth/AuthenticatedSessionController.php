<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Check the authenticated user's role
        $user = Auth::user();

        // dd($user);

        // Use the roles relationship to determine the role
        if ($user->roles()->where('name', 'admin')->exists()) {
            // session()->flash('success', 'Berjaya log masuk.');
            return redirect()->intended(route('admin.landing', absolute: false));
        }
        else{
            // Flash success message in session
            // session()->flash('success', 'Berjaya log masuk.');
            return redirect()->intended(route('user.landing', absolute: false));
        }
        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}