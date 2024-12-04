<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\RequestHelp;
use App\Models\OfferHelp;
use Illuminate\Http\Request;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RequestHelpController extends Controller
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
            'requester_id' => 'required',
            'category' => 'required',
            'details' => 'required',
            'quantity' => 'required',
            'urgent' => 'required',
            'phone_number' => 'required',
            'proof' => 'required|image|mimes:jpeg,png,jpg|max:100000',
            'qr_code' => 'required|image|mimes:jpeg,png,jpg|max:100000',
            'latitude_map' => 'required',
            'longitude_map' => 'required',
            'full_address' => 'required',
            'declaration' => 'required',
        ]);
    
        // Get the current date and the date a week before
        $currentDate = Carbon::now();
        $weekAgoDate = $currentDate->subDays(7);
    
        // Check if the requester has made more than 3 requests in the past week
        $requestCount = RequestHelp::where('requester_id', $request->requester_id)
            ->whereBetween('created_at', [$weekAgoDate, Carbon::now()])
            ->whereIn('status', ['0','1','3'])
            ->count();
    
        if ($requestCount >= 3) {
            return redirect()->back()->with('error', 'You have reached the limit of 3 requests within the past week.');
        }
    
        // Proceed to handle the request
        if ($request->has('proof') && $request->has('qr_code')) {
            $help = new RequestHelp();
            $help->requester_id = $request->requester_id;
            $help->category = $request->category;
            $help->details = $request->details;
            $help->quantity = $request->quantity;
            $help->urgent = $request->urgent;
            $help->phone_number = $request->phone_number;
            $help->latitude_map = $request->latitude_map;
            $help->longitude_map = $request->longitude_map;
            $help->full_address = $request->full_address;
            $help->declaration = $request->declaration;
            $help->status = '0';
    
            // Temporary placeholder for proof & QR code
            $help->proof = 'temp_placeholder';
            $help->qr_code = 'temp_placeholder';
    
            $help->save();
    
            if (!empty($help)) {
                $file_name_1 = $help->id . '.' . $request->proof->extension();
                $file_name_2 = $help->id . '.' . $request->qr_code->extension();
    
                $file_1 = $request->proof;
                $file_2 = $request->qr_code;
    
                $file_folder_1 = public_path('user_request_proof_images/');
                if (!File::isDirectory($file_folder_1)) {
                    File::makeDirectory($file_folder_1, 0777, true, true);
                }
    
                $file_folder_2 = public_path('user_request_qr_images/');
                if (!File::isDirectory($file_folder_2)) {
                    File::makeDirectory($file_folder_2, 0777, true, true);
                }
    
                $file_1->move($file_folder_1, $file_name_1);
                $file_2->move($file_folder_2, $file_name_2);
    
                // Update the proof & QR code fields with the correct file name
                $help->update([
                    'proof' => $file_name_1,
                    'qr_code' => $file_name_2,
                ]);
    
                return redirect(route('user.request_submitted'))->with('success', 'Request help successfully submitted. Please wait for admin approval.');
            } else {
                return redirect()->back()->with('error', 'Failed to submit request help.');
            }
        } else {
            return redirect()->back()->with('error', 'Please upload proof & QR code image in JPEG/JPG/PNG format.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(RequestHelp $requestHelp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestHelp $requestHelp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequestHelp $requestHelp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestHelp $requestHelp)
    {
        //
    }

    public function user_request_help_category($category)
    {

        $requester = Auth::user();

        $req_category = $category;

        return view('user.request_help_form')->with('requester', $requester)
                                            ->with('category', $req_category);

    }

    public function find_full_address(Request $request)
    {
        $full_address = $request->full_address;
    
        $request_address = RequestHelp::all();
    
        $find_address = RequestHelp::where('full_address', 'LIKE', '%' . $full_address . '%')->get();
    
        return response()->json(['data' => $find_address], 200);

    }

    public function user_request_submitted()
    {

        return view('user.request_submitted');

    }

    public function get_approved_request()
    {

        $user = Auth::user();

        // only display other ppl request help
        $approved_requests = RequestHelp::where('status', 1)->where('requester_id', '!=', $user->id)->get();
    
        return response()->json(['data' => $approved_requests], 200);

    }

    public function user_browse_request()
    {
        $user = Auth::user();

        $request_helps = RequestHelp::where('status', 1)->where('requester_id', '!=', $user->id)->orderBy('updated_at', 'desc')->paginate(10);

        // Optionally, you can format the `updated_at` in your controller like this:
        foreach ($request_helps as $request_help) {
            $request_help->posted_time = $request_help->updated_at->diffForHumans();
        }

        return view('user.browse_request')->with('request_helps', $request_helps);

    }

    public function admin_request_list()
    {

        $requesting_helps = RequestHelp::where('status', 0)->orderBy('created_at', 'desc')->paginate(10);

        $approved_helps = RequestHelp::where('status', 1)->orderBy('updated_at', 'desc')->paginate(10);

        $rejected_helps = RequestHelp::where('status', 2)->orderBy('updated_at', 'desc')->paginate(10);

        $settled_helps = RequestHelp::where('status', 3)->orderBy('updated_at', 'desc')->paginate(10);

        // Optionally, you can format the `created_at` in your controller like this:
        foreach ($requesting_helps as $request_help) {
            $request_help->new_date_time = $request_help->created_at->format('d-M-Y h:i A');
        }
        
        foreach ($approved_helps as $request_help) {
            $request_help->new_date_time = $request_help->updated_at->format('d-M-Y h:i A');
        }
        
        foreach ($rejected_helps as $request_help) {
            $request_help->new_date_time = $request_help->updated_at->format('d-M-Y h:i A');
        }
        
        foreach ($settled_helps as $request_help) {
            $request_help->new_date_time = $request_help->updated_at->format('d-M-Y h:i A');
        }

        return view('admin.main_request')->with('requesting_helps', $requesting_helps)
                                        ->with('approved_helps', $approved_helps)
                                        ->with('rejected_helps', $rejected_helps)
                                        ->with('settled_helps', $settled_helps);

    }

    public function admin_view_request_details($id)
    {

        $request_id = $id;

        $request_detail = RequestHelp::find($request_id);

        if($request_detail){

            $offer_lists = OfferHelp::where('request_id', $request_detail->id)->get();

            if(count($offer_lists) > 0){

                return view('admin.view_request_details')->with('detail', $request_detail)
                                                        ->with('offers', $offer_lists);

            }
            else{

                return view('admin.view_request_details')->with('detail', $request_detail);

            }

        }
        else{

            return redirect()->back()->with('error', 'Request help details not found.');

        }

    }

    public function admin_update_request_status(Request $request)
    {

        $request->validate([
            'request_id' => 'required',
            'request_status' => 'required',
        ]);

        $find_request = RequestHelp::find($request->request_id);
    
        if (!$find_request) {
            return redirect()->back()->with('error', 'Request help not found.');
        }
    
        if ($request->request_status == '2') { // Status: Rejected
            $request->validate([
                'reason' => 'required',
            ]);
    
            $find_request->update([
                'status' => $request->request_status,
                'reason' => $request->reason,
            ]);
    
            return redirect()->route('admin.request_list')->with('success', 'Request help status updated successfully.');
        } elseif ($request->request_status == '1') { // Status: Approved
            // Count all approved requests
            $approvedCount = RequestHelp::whereIn('status', ['1','3'])->count();
    
            // Generate the running number
            $runningNumber = '#' . str_pad($approvedCount + 1, 6, '0', STR_PAD_LEFT);
    
            $find_request->update([
                'status' => $request->request_status,
                'request_number' => $runningNumber,
            ]);
    
            return redirect()->route('admin.request_list')->with('success', 'Request help approved successfully with running number: ' . $runningNumber);
        } else { // Other statuses
            $find_request->update([
                'status' => $request->request_status,
            ]);
    
            return redirect()->route('admin.request_list')->with('success', 'Request help status updated successfully.');
        }

    }

    public function user_cancel_request_help(Request $request)
    {

        $request->validate([
            'request_id' => 'required',
        ]);

        $find_request = RequestHelp::find($request->request_id);

        if($find_request){

            $find_request->delete();

            return redirect()->back()->with('success', 'Request help successfully canceled.');

        }
        else{

            return redirect()->back()->with('error', 'Failed to cancel request help.');

        }

    }

}
