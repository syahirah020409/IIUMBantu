<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // return view('profile.edit', [
        //     'user' => $request->user(),
        // ]);

        $user = Auth::user();

        if(Auth::user()->roles()->where('name', 'admin')->exists()){

            return view('user.user_profile_edit')->with('user', $user);

        }
        else{

            return view('user.user_profile_edit')->with('user', $user);

        }

    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function view_profile()
    {

        $user = Auth::user();

        return view('user.user_profile')->with('user', $user);

    }

    public function new_profile_update(Request $request)
    {

        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:100000',
        ]);

        if($request->has('profile_photo')){

            $file_name = $user->id . '.' . $request->profile_photo->extension();
            
            $file = $request->profile_photo;
    
            $file_folder = public_path('user_profile_photo/');
            if (!File::isDirectory($file_folder)) {
                File::makeDirectory($file_folder, 0777, true, true);
            }
    
            $file->move($file_folder, $file_name);
            
            $user->update([
                'name' => $request->name,
                'photo' => $file_name,
                'phone_number' => $request->phone_number,
            ]);

            return redirect(route('profile.view'))->with('success', 'Your profile successfully updated.');

        }
        else{
            
            $user->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
            ]);

            return redirect(route('profile.view'))->with('success', 'Your profile successfully updated.');

        }

    }

    public function user_change_password()
    {

        return view('user.user_change_password');

    }

}
