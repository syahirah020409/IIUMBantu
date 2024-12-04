<x-app-layout>
    <style>

        ul {
            list-style-type: disc !important; /* Default bullet style */
            padding-left: 20px;    /* Ensure there's space for the bullets */
            margin-bottom:10px !important;
        }

    </style>

    <div class="row" style="background-color:#FDFCF7 !important;">
        <div class="col-md-12 col-12">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12 background-col-admin-request">
            <span class="admin_request_title">Collab Donation Details</span>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="height:50px !important; background-color:#FDFCF7 !important;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12" style="height:auto !important; padding:50px 0px 50px 0px !important;">
            <div class="row m-0 justify-content-center">
                <div class="col-md-10 col-10" style="padding:50px !important; border-radius:50px !important; background-color:#166269 !important;">
                    <div class="card">
                        <div class="card-header" style="background-color:#FDFCF7 !important; font-size:16pt !important; font-weight:bold !important;">
                            <div class="row justify-content-between">
                                <div class="col-md-8 col-8">
                                    View Collab Donation Details
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-12" style="padding:10px 30px 10px 30px !important;">
                                    <div class="row mx-0" style="margin-top:20px !important;">
                                        <div class="col-md-12 col-12 p-0" style="border-bottom:3px solid #166269 !important;">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <label for="details" class="view_request_1">Requester</label>
                                                </div>
                                                <div class="col-md-1 col-1 text-end">
                                                    <span class="view_request_1">: </span>
                                                </div>
                                                <div class="col-md-8 col-8">
                                                    <span class="view_request_info_1">{{ $collab->requester->name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-0" style="margin-top:20px !important;">
                                        <div class="col-md-12 col-12 p-0" style="border-bottom:3px solid #166269 !important;">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <label for="details" class="view_request_1">Program Name</label>
                                                </div>
                                                <div class="col-md-1 col-1 text-end">
                                                    <span class="view_request_1">: </span>
                                                </div>
                                                <div class="col-md-8 col-8">
                                                    <span class="view_request_info_1">{{ $collab->name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-0" style="margin-top:20px !important;">
                                        <div class="col-md-12 col-12 p-0" style="border-bottom:3px solid #166269 !important;">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <label for="details" class="view_request_1">Description</label>
                                                </div>
                                                <div class="col-md-1 col-1 text-end">
                                                    <span class="view_request_1">: </span>
                                                </div>
                                                <div class="col-md-8 col-8" style="text-align:justify !important; margin-bottom:10px !important;">
                                                    <span class="view_request_info_1">{{ $collab->description }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-0" style="margin-top:20px !important;">
                                        <div class="col-md-12 col-12 p-0" style="border-bottom:3px solid #166269 !important;">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <label for="details" class="view_request_1">Target Amount</label>
                                                </div>
                                                <div class="col-md-1 col-1 text-end">
                                                    <span class="view_request_1">: </span>
                                                </div>
                                                <div class="col-md-8 col-8">
                                                    <span class="view_request_info_1">RM {{ number_format($collab->target_amount, 2) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-0" style="margin-top:20px !important;">
                                        <div class="col-md-12 col-12 p-0" style="border-bottom:3px solid #166269 !important;">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <label for="details" class="view_request_1">Donation For</label>
                                                </div>
                                                <div class="col-md-1 col-1 text-end">
                                                    <span class="view_request_1">: </span>
                                                </div>
                                                <div class="col-md-8 col-8">
                                                    <span class="view_request_info_1">
                                                        @if($collab->donation_for != NULL && !empty($collab->donation_for))
                                                            <ul>
                                                                @foreach($collab->new_donation_for as $donate_for)
                                                                    <li>{{ $donate_for }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            -
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-0" style="margin-top:20px !important;">
                                        <div class="col-md-12 col-12 p-0" style="border-bottom:3px solid #166269 !important;">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <label for="details" class="view_request_1">Request Date & Time</label>
                                                </div>
                                                <div class="col-md-1 col-1 text-end">
                                                    <span class="view_request_1">: </span>
                                                </div>
                                                <div class="col-md-8 col-8">
                                                    <span class="view_request_info_1">{{ (new DateTime($collab->created_at))->format('d-M-Y h:i A') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-0" style="margin-top:20px !important; margin-bottom:20px !important">
                                        <div class="col-md-12 col-12 p-0">
                                            <div class="row">
                                                <div class="col-md-6 col-6 text-center">
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewPoster">Poster</button>
                                                </div>
                                                <div class="col-md-6 col-6 text-center">
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewBackground">Background</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin-top:30px !important; margin-bottom:20px !important;">
                                @if($collab->status == 0)
                                    <div class="col-md-4 col-4 text-center">
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approveCollab">Approve</button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectCollab">Reject</button>
                                    </div>
                                @elseif($collab->status == 1)
                                    <div class="col-md-4 col-4 text-center">
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateCollab">End</button>
                                    </div>
                                @else
                                    <div class="col-md-4 col-4 text-center">
                                        <a href="{{ route('admin.donation_list') }}" class="btn btn-dark">Back</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="height:50px !important; background-color:#FDFCF7 !important;">
        </div>
    </div>

    <div class="row justify-content-center m-0">
        <div class="col-md-10 col-10 p-0">
            <div class="row m-0" style="padding:50px 0px 50px 0px !important;">
                <div class="col-md-2 col-2 d-flex justify-content-end">
                    <img src="{{ asset('web_image/logo_2.png') }}" alt="" style="height:150px !important; width:150px !important;">
                </div>
                <div class="col-md-10 col-10" style="padding:20px 0px 10px 0px !important;">
                    <span class="footer_label">
                        Kuliyyah of Information and
                    </span><br>
                    <span class="footer_label_1">
                        Communication Technology
                    </span><br><br>
                    <a href="" class="btn-orange-1"><i class="fa-solid fa-envelope"></i></a>
                    <a href="" class="btn-orange-1"><i class="fa-solid fa-phone"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="viewPoster" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">View Program Poster</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size:13pt !important;">
                    <div class="row mb-3 mx-0">
                        <div class="col-md-12 d-flex align-items-center">
                            <img src="{{asset('user_collab_donation_poster/'.$collab->poster)}}" alt="" style="width:100% !important; height:auto !important; border-radius:15px !important;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="viewBackground" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">View Background Image for Title</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size:13pt !important;">
                    <div class="row mb-3 mx-0">
                        <div class="col-md-12 d-flex align-items-center">
                            <img src="{{asset('user_collab_donation_background/'.$collab->background)}}" alt="" style="width:100% !important; height:auto !important; border-radius:15px !important;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="approveCollab" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">Approving Collab Donation</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size:13pt !important;">
                    <form action="{{ route('admin.update_collab_status') }}" method="POST">
                        @csrf
                        <div class="row mb-3 mx-0">
                            <div class="col-md-12 text-center">
                                <span style="font-size:16pt !important; font-weight:600 !important;">Are you sure want to approve?</span>
                                <input type="text" name="collab_id" value="{{ $collab->id }}" hidden>
                                <input type="text" name="collab_status" value="1" hidden>
                            </div>
                        </div>
                        <div class="row mb-3 mx-0">
                            <div class="col-md-12 col-12 text-center">
                                <button type="submit" class="btn btn-success">Yes</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="rejectCollab" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">Rejecting Collab Donation</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size:13pt !important;">
                    <form action="{{ route('admin.update_collab_status') }}" method="POST">
                        @csrf
                        <div class="row mb-3 mx-0">
                            <div class="col-md-12 text-center">
                                <span style="font-size:16pt !important; font-weight:600 !important;">Are you sure want to reject?</span>
                                <input type="text" name="collab_id" value="{{ $collab->id }}" hidden>
                                <input type="text" name="collab_status" value="2" hidden>
                            </div>
                        </div>
                        <div class="row mb-3 mx-0">
                            <div class="col-md-12 text-center">
                                <textarea name="reason" class="form-control" id="reason" rows="4" placeholder="Please state your reason for rejecting this request.." style="border-radius:20px !important;" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3 mx-0">
                            <div class="col-md-12 col-12 text-center">
                                <button type="submit" class="btn btn-success">Yes</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="updateCollab" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">End Collab Donation Program</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size:13pt !important;">
                    <form action="{{ route('admin.update_collab_status') }}" method="POST">
                        @csrf
                        <div class="row mb-3 mx-0">
                            <div class="col-md-12 text-center">
                                <span style="font-size:16pt !important; font-weight:600 !important;">Are you sure this program has ended?</span>
                                <input type="text" name="collab_id" value="{{ $collab->id }}" hidden>
                                <input type="text" name="collab_status" value="3" hidden>
                            </div>
                        </div>
                        <div class="row mb-3 mx-0">
                            <div class="col-md-12 col-12 text-center">
                                <button type="submit" class="btn btn-success">Yes</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        
    </script>

</x-app-layout>
