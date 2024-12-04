<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        // Check if the email ends with @live.iium.edu.my
        if (!str_ends_with($request->email, '@live.iium.edu.my')) {
            return back()
                ->withInput() // Keep the entered input
                ->with('swal_warning', 'Please use your IIUM live email.');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Find the role you want to assign (you might want to create this role first in a seeder)
        $userRole = Role::where('name', 'user')->first(); // Ensure this role exists in your roles table

        // Attach the role to the user
        $user->roles()->attach($userRole, ['created_at' => now(), 'updated_at' => now()]);

        event(new Registered($user));

        Auth::login($user);

        session()->flash('success', 'User account registered successfully.');
        return redirect(route('user.landing', absolute: false));
    }

}
