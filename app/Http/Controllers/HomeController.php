<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\RequestHelp;
use App\Models\OfferHelp;
use App\Models\CollabDonation;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function admin_landing()
    {

        return view('admin.landing');

    }

    public function user_landing()
    {

        $user = Auth::user();

        return view('user.landing', compact('user'));

    }

    public function admin_dashboard()
    {
        $user_count = User::whereHas('roles', function($query) {
            $query->where('name', 'user');
        })->count();

        $request_count = RequestHelp::count();

        $offer_count = OfferHelp::count();

        $collab_count = CollabDonation::count();

        return view('admin.dashboard')->with('user_count', $user_count)
                                    ->with('request_count', $request_count)
                                    ->with('offer_count', $offer_count)
                                    ->with('collab_count', $collab_count);

    }

    public function user_dashboard()
    {

        $user = Auth::user();

        return view('user.dashboard', compact('user'));

    }

    public function user_about_us()
    {

        return view('user.about_us');

    }

    public function user_map()
    {

        return view('user.map');

    }

    public function user_request_help()
    {
        
        return view('user.request_help');

    }

    public function admin_registered_user_list()
    {

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->orderBy('created_at', 'desc')->paginate(10);
        
        foreach ($users as $user) {
            $user->new_date_time = $user->created_at->format('d-M-Y h:i A');
        }

        return view('admin.registered_user_list')->with('users', $users);

    }

}
