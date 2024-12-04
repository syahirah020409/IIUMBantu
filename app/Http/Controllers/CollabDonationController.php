<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CollabDonation;
use Illuminate\Http\Request;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CollabDonationController extends Controller
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

        $requester = Auth::user();

        return view('user.collaboration_form')->with('requester', $requester);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'requester_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'target_amount' => 'required',
            'donation_for' => 'nullable',
            'poster' => 'required|image|mimes:jpeg,png,jpg|max:100000',
            'background' => 'required|image|mimes:jpeg,png,jpg|max:100000',
        ]);

        // Split the donation_for field into an array, using commas as the delimiter
        if($validated['donation_for'] != null && $validated['donation_for'] != ''){

            $donationForArray = array_map('trim', explode(',', $validated['donation_for']));

        }
    
        // Proceed to handle the request if poster and background are present
        if ($request->has('poster') && $request->has('background')) {
            $collab = new CollabDonation();
            $collab->requester_id = $request->requester_id;
            $collab->name = $request->name;
            $collab->description = $request->description;
            $collab->target_amount = $request->target_amount;
            

            // Split the donation_for field into an array, using commas as the delimiter
            if($validated['donation_for'] != null && $validated['donation_for'] == ''){

                // Save the donation_for as a JSON-encoded string (if you want to store it as an array in the database)
                $collab->donation_for = json_encode($donationForArray); 

            }
            
            $collab->status = '0';
            
            // Temporary placeholder for poster & background
            $collab->poster = 'temp_placeholder';
            $collab->background = 'temp_placeholder';
    
            $collab->save();
    
            if (!empty($collab)) {
                // Process the files for poster and background
                $file_name_1 = $collab->id . '.' . $request->poster->extension();
                $file_name_2 = $collab->id . '.' . $request->background->extension();
    
                $file_1 = $request->poster;
                $file_2 = $request->background;
    
                $file_folder_1 = public_path('user_collab_donation_poster/');
                if (!File::isDirectory($file_folder_1)) {
                    File::makeDirectory($file_folder_1, 0777, true, true);
                }
    
                $file_folder_2 = public_path('user_collab_donation_background/');
                if (!File::isDirectory($file_folder_2)) {
                    File::makeDirectory($file_folder_2, 0777, true, true);
                }
    
                $file_1->move($file_folder_1, $file_name_1);
                $file_2->move($file_folder_2, $file_name_2);
    
                // Update the proof & QR code fields with the correct file name
                $collab->update([
                    'poster' => $file_name_1,
                    'background' => $file_name_2,
                ]);
    
                return redirect(route('user.donation'))->with('success', 'Collab donation successfully submitted. Please wait for admin approval.');
            } else {
                return redirect()->back()->with('error', 'Failed to submit collab donation.');
            }
        } else {
            return redirect()->back()->with('error', 'Please upload poster & background image in JPEG/JPG/PNG format.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(CollabDonation $collabDonation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CollabDonation $collabDonation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CollabDonation $collabDonation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CollabDonation $collabDonation)
    {
        //
    }

    public function user_donation_list()
    {

        $donations = CollabDonation::where('status', 1)->orderBy('created_at', 'desc')->paginate(5);

        return view('user.donation')->with('donations', $donations);

    }

    public function admin_donation_list()
    {

        $requesting_donations = CollabDonation::where('status', 0)->orderBy('created_at', 'desc')->paginate(10);
        $approved_donations = CollabDonation::where('status', 1)->orderBy('updated_at', 'desc')->paginate(10);
        $rejected_donations = CollabDonation::where('status', 2)->orderBy('updated_at', 'desc')->paginate(10);
        $ended_donations = CollabDonation::where('status', 3)->orderBy('updated_at', 'desc')->paginate(10);

        foreach ($requesting_donations as $donate) {
            $donate->new_date_time = $donate->created_at->format('d-M-Y h:i A');
        }

        foreach ($approved_donations as $donate) {
            $donate->new_date_time = $donate->updated_at->format('d-M-Y h:i A');
        }

        foreach ($rejected_donations as $donate) {
            $donate->new_date_time = $donate->updated_at->format('d-M-Y h:i A');
        }

        foreach ($ended_donations as $donate) {
            $donate->new_date_time = $donate->updated_at->format('d-M-Y h:i A');
        }

        return view('admin.main_donation')->with('requesting_donations', $requesting_donations)
                                        ->with('approved_donations', $approved_donations)
                                        ->with('rejected_donations', $rejected_donations)
                                        ->with('ended_donations', $ended_donations);

    }

    public function admin_view_collab_details($id)
    {

        $collab_id = $id;

        $collab = CollabDonation::find($collab_id);

        if($collab){

            if(!empty($collab->donation_for)){

                $collab->new_donation_for = json_decode($collab->donation_for);

            }

            return view('admin.view_collab_details')->with('collab', $collab);

        }
        else{

            return redirect()->back()->with('error', 'Collab donation details not found.');

        }

    }

    public function admin_update_collab_status(Request $request)
    {

        $request->validate([
            'collab_id' => 'required',
            'collab_status' => 'required',
        ]);

        $find_collab = CollabDonation::find($request->collab_id);
    
        if (!$find_collab) {
            return redirect()->back()->with('error', 'Collab donation program not found.');
        }
    
        if ($request->collab_status == '2') { // Status: Rejected
            $request->validate([
                'reason' => 'required',
            ]);
    
            $find_collab->update([
                'status' => $request->collab_status,
                'reason' => $request->reason,
            ]);
    
            return redirect()->route('admin.donation_list')->with('success', 'Collab donation program status updated successfully.');
        } else { // Other statuses
            $find_collab->update([
                'status' => $request->collab_status,
            ]);
    
            return redirect()->route('admin.donation_list')->with('success', 'Collab donation program status updated successfully.');
        }

    }

    public function user_collab_donation_details($id)
    {

        $collab_id = $id;

        $collab = CollabDonation::find($collab_id);

        if($collab){

            if(!empty($collab->donation_for)){

                $collab->new_donation_for = json_decode($collab->donation_for);

            }

            return view('user.view_donation_details')->with('collab', $collab);
            
        }
        else{

            return redirect()->back()->with('error', 'Collab donation details not found.');

        }

    }

}
