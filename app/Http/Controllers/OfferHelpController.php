<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\RequestHelp;
use App\Models\OfferHelp;
use App\Models\CollabDonation;
use Illuminate\Http\Request;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OfferHelpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'request_id' => 'required',
            'helper_id' => 'required',
            'help_type' => 'required',
            'quantity' => 'required',
            'proof' => 'required|image|mimes:jpeg,png,jpg|max:1000000',
        ]);

        // dd($request);

        // Proceed to handle the request
        if ($request->has('proof')) {
            $help = new OfferHelp();
            $help->request_id = $request->request_id;
            $help->helper_id = $request->helper_id;
            $help->help_type = $request->help_type;
            $help->quantity = $request->quantity;
    
            // Temporary placeholder for proof & QR code
            $help->proof = 'temp_placeholder';
    
            $help->save();
    
            if (!empty($help)) {
                $file_name_1 = $help->id . '.' . $request->proof->extension();
    
                $file_1 = $request->proof;
    
                $file_folder_1 = public_path('user_offer_proof_images/');
                if (!File::isDirectory($file_folder_1)) {
                    File::makeDirectory($file_folder_1, 0777, true, true);
                }
    
                $file_1->move($file_folder_1, $file_name_1);
    
                // Update the proof & QR code fields with the correct file name
                $help->update([
                    'proof' => $file_name_1,
                ]);
    
                return redirect(route('user.offer_submitted'))->with('success', 'Offer help successfully submitted. Please wait for admin verify.');

            } else {

                return redirect()->back()->with('error', 'Failed to submit sending help.');

            }

        } else {

            return redirect()->back()->with('error', 'Please upload proof & QR code image in JPEG/JPG/PNG format.');

        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(OfferHelp $offerHelp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OfferHelp $offerHelp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OfferHelp $offerHelp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfferHelp $offerHelp)
    {
        //
    }

    public function user_offer_help($id)
    {

        $find_request = RequestHelp::find($id);

        if($find_request){

            return view('user.offer_help')->with('help', $find_request);

        }
        else{

            return redirect()->back()->with('error', 'Request help details not found.');

        }

    }

    public function user_offer_help_type($type, $id)
    {

        $helper = Auth::user();

        $help_type = $type;
        $request_id = $id;

        $find_request = RequestHelp::find($request_id);

        if($find_request){

            return view('user.offer_help_form')->with('help', $find_request)
                                            ->with('helper', $helper)
                                            ->with('help_type', $help_type);

        }
        else{

            return redirect()->back()->with('error', 'Request help details not found.');

        }

    }

    public function user_offer_submitted()
    {

        return view('user.offer_submitted');

    }

    public function admin_offer_list()
    {

        $unverified = OfferHelp::where('status', 0)->orderBy('created_at', 'desc')->paginate(10);

        $verified = OfferHelp::where('status', 1)->orderBy('updated_at', 'desc')->paginate(10);

        // Optionally, you can format the `created_at` in your controller like this:
        foreach ($unverified as $offer_help) {
            $offer_help->new_date_time = $offer_help->created_at->format('d-M-Y h:i A');
        }
        
        foreach ($verified as $offer_help) {
            $offer_help->new_date_time = $offer_help->updated_at->format('d-M-Y h:i A');
        }

        return view('admin.main_offer')->with('unverifieds', $unverified)
                                        ->with('verifieds', $verified);
        
    }

    public function admin_update_offer_status(Request $request)
    {

        $request->validate([
            'offer_id' => 'required',
            'offer_status' => 'required',
        ]);

        $find_offer = OfferHelp::find($request->offer_id);
    
        if (!$find_offer) {
            return redirect()->back()->with('error', 'Offer help not found.');
        }
        else{

            $find_offer->update([
                'status' => $request->offer_status,
            ]);
    
            return redirect()->back()->with('success', 'Offer help successfully verified.');

        }

    }

    public function user_main_listing()
    {

        $user = Auth::user();

        $requests = RequestHelp::where('requester_id', $user->id)->orderBy('updated_at', 'desc')->paginate(10);

        $offers = OfferHelp::where('helper_id', $user->id)->orderBy('updated_at', 'desc')->paginate(10);

        $collabs = CollabDonation::where('requester_id', $user->id)->orderBy('updated_at', 'desc')->paginate(10);

        // Optionally, you can format the `created_at` in your controller like this:
        foreach ($requests as $help) {
            $help->new_date_time = $help->updated_at->format('d-M-Y h:i A');
        }
        
        foreach ($offers as $offer) {
            $offer->new_date_time = $offer->updated_at->format('d-M-Y h:i A');
        }
        
        foreach ($collabs as $collab) {
            $collab->new_date_time = $collab->updated_at->format('d-M-Y h:i A');
        }

        return view('user.main_listing')->with('requests', $requests)
                                        ->with('offers', $offers)
                                        ->with('collabs', $collabs);
        
    }

}
