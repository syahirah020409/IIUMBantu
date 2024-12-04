<x-app-layout>
    <style>

        #map {
            height: 100% !important;
            width: 100% !important;
        }

    </style>

    <div class="row" style="background-color:#FDFCF7 !important;">
        <div class="col-md-12 col-12">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12 background-col-admin-request">
            <span class="admin_request_title">Request Details</span>
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
                                <div class="col-md-4 col-4">
                                    View Request Details
                                </div>
                                <div class="col-md-4 col-4 text-end">
                                    @if($detail->urgent == 'yes')
                                        <i class="fa-solid fa-circle" style="color:#D5993F !important;"></i>&emsp;High Urgency</span>
                                    @else
                                        <i class="fa-solid fa-circle" style="color:#166269 !important;"></i>&emsp;Low Urgency</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <div class="row mx-0" style="margin-top:20px !important;">
                                        <div class="col-md-12 col-12 p-0" style="border-bottom:3px solid #166269 !important;">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <label for="details" class="view_request_1">Requester</label>
                                                </div>
                                                <div class="col-md-9 col-9">
                                                    <span class="view_request_1">: </span><span class="view_request_info_1">{{ $detail->requester->name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-0" style="margin-top:20px !important;">
                                        <div class="col-md-12 col-12 p-0" style="border-bottom:3px solid #166269 !important;">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <label for="details" class="view_request_1">Category</label>
                                                </div>
                                                <div class="col-md-9 col-9">
                                                    <span class="view_request_1">: </span><span class="view_request_info_1">{{ $detail->category }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-0" style="margin-top:20px !important;">
                                        <div class="col-md-12 col-12 p-0" style="border-bottom:3px solid #166269 !important;">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <label for="details" class="view_request_1">Details</label>
                                                </div>
                                                <div class="col-md-9 col-9">
                                                    <span class="view_request_1">: </span><span class="view_request_info_1">{{ $detail->details }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-0" style="margin-top:20px !important;">
                                        <div class="col-md-12 col-12 p-0" style="border-bottom:3px solid #166269 !important;">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <label for="details" class="view_request_1">Quantity</label>
                                                </div>
                                                <div class="col-md-9 col-9">
                                                    <span class="view_request_1">: </span><span class="view_request_info_1">{{ $detail->quantity }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-0" style="margin-top:20px !important;">
                                        <div class="col-md-12 col-12 p-0" style="border-bottom:3px solid #166269 !important;">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <label for="details" class="view_request_1">Contact</label>
                                                </div>
                                                <div class="col-md-9 col-9">
                                                    <span class="view_request_1">: </span><span class="view_request_info_1">{{ $detail->phone_number }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-0" style="margin-top:20px !important;">
                                        <div class="col-md-12 col-12 p-0" style="border-bottom:3px solid #166269 !important;">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <label for="details" class="view_request_1">Address</label>
                                                </div>
                                                <div class="col-md-9 col-9">
                                                    <span class="view_request_1">: </span><span class="view_request_info_1">{{ $detail->full_address }}</span>
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
                                                <div class="col-md-9 col-9">
                                                    <span class="view_request_1">: </span><span class="view_request_info_1">{{ (new DateTime($detail->created_at))->format('d-M-Y h:i A') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-0" style="margin-top:20px !important; margin-bottom:20px !important">
                                        <div class="col-md-12 col-12 p-0">
                                            <div class="row">
                                                <div class="col-md-6 col-6 text-center">
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewProof">Proof</button>
                                                </div>
                                                <div class="col-md-6 col-6 text-center">
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewQR">QR Code</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div id="map" style="height:100% !important; width:100% !important;"></div>
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin-top:30px !important; margin-bottom:20px !important;">
                                @if($detail->status == 0)
                                    <div class="col-md-4 col-4 text-center">
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approveRequest">Approve</button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectRequest">Reject</button>
                                    </div>
                                @elseif($detail->status == 1)
                                    <div class="col-md-4 col-4 text-center">
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateRequest">End</button>
                                    </div>
                                @else
                                    <div class="col-md-4 col-4 text-center">
                                        <a href="{{ route('admin.request_list') }}" class="btn btn-dark">Back</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(isset($offers) && count($offers) > 0)
                <div class="row m-0 justify-content-center">
                    <div class="col-md-10 col-10" style="padding:50px !important; border-radius:50px !important; background-color:#166269 !important;">
                        <div class="card">
                            <div class="card-header" data-bs-toggle="collapse" data-bs-target="#viewOfferList" aria-expanded="false" aria-controls="viewOfferList" style="background-color:#FDFCF7 !important; font-size:16pt !important; font-weight:bold !important; cursor:pointer !important;">
                                <div class="row justify-content-between">
                                    <div class="col-md-12 col-12">
                                        View Offer Details (Click Here To View)
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="collapse" id="viewOfferList">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Helper</th>
                                                        <th class="text-center">Method</th>
                                                        <th class="text-center">Quantity / Amount</th>
                                                        <th class="text-center">Proof</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($offers as $offer)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td>{{ $offer->helper->name }}</td>
                                                            <td class="text-center">
                                                                @if($offer->help_type == 'in_person')
                                                                    In-Person
                                                                @else
                                                                    Online Transfer
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if($offer->request->category == 'financial')
                                                                    RM {{ $offer->quantity }}
                                                                @else
                                                                    {{ $offer->quantity }}
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewOfferProof_{{ $offer->id }}">View</button>
                                                            </td>
                                                            <td class="text-center">
                                                                @if($offer->status == 0)
                                                                    <span class="badge bg-warning">Unverified</span>
                                                                @else
                                                                    <span class="badge bg-success">Verified</span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if($offer->status == 0)
                                                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#verifyOffer_{{ $offer->id }}">Verify</button>
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
    <div class="modal fade" id="viewProof" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">View Proof</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size:13pt !important;">
                    <div class="row mb-3 mx-0">
                        <div class="col-md-12 d-flex align-items-center">
                            <img src="{{asset('user_request_proof_images/'.$detail->proof)}}" alt="" style="width:100% !important; height:auto !important; border-radius:15px !important;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="viewQR" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">View QR Code</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size:13pt !important;">
                    <div class="row mb-3 mx-0">
                        <div class="col-md-12 d-flex align-items-center">
                            <img src="{{asset('user_request_qr_images/'.$detail->qr_code)}}" alt="" style="width:100% !important; height:auto !important; border-radius:15px !important;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="approveRequest" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">Approving Request</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size:13pt !important;">
                    <form action="{{ route('admin.update_request_status') }}" method="POST">
                        @csrf
                        <div class="row mb-3 mx-0">
                            <div class="col-md-12 text-center">
                                <span style="font-size:16pt !important; font-weight:600 !important;">Are you sure want to approve?</span>
                                <input type="text" name="request_id" value="{{ $detail->id }}" hidden>
                                <input type="text" name="request_status" value="1" hidden>
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
    <div class="modal fade" id="rejectRequest" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">Rejecting Request</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size:13pt !important;">
                    <form action="{{ route('admin.update_request_status') }}" method="POST">
                        @csrf
                        <div class="row mb-3 mx-0">
                            <div class="col-md-12 text-center">
                                <span style="font-size:16pt !important; font-weight:600 !important;">Are you sure want to reject?</span>
                                <input type="text" name="request_id" value="{{ $detail->id }}" hidden>
                                <input type="text" name="request_status" value="2" hidden>
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
    <div class="modal fade" id="updateRequest" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">Update Request Status</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size:13pt !important;">
                    <form action="{{ route('admin.update_request_status') }}" method="POST">
                        @csrf
                        <div class="row mb-3 mx-0">
                            <div class="col-md-12 text-center">
                                <span style="font-size:16pt !important; font-weight:600 !important;">Are you sure this request had been helped?</span>
                                <input type="text" name="request_id" value="{{ $detail->id }}" hidden>
                                <input type="text" name="request_status" value="3" hidden>
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

    @if(isset($offers) && count($offers) > 0)
        @foreach($offers as $offer)
            <!-- Modal -->
            <div class="modal fade" id="viewOfferProof_{{ $offer->id }}" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="staticBackdropLabel">View Send Help Proof</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="font-size:13pt !important;">
                            <div class="row mb-3 mx-0">
                                <div class="col-md-12 d-flex align-items-center">
                                    <img src="{{asset('user_offer_proof_images/'.$offer->proof)}}" alt="" style="width:100% !important; height:auto !important; border-radius:15px !important;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Modal -->
            <div class="modal fade" id="verifyOffer_{{ $offer->id }}" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="staticBackdropLabel">Verifying Offer Help</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="font-size:13pt !important;">
                            <form action="{{ route('admin.update_offer_status') }}" method="POST">
                                @csrf
                                <div class="row mb-3 mx-0">
                                    <div class="col-md-12 text-center">
                                        <span style="font-size:16pt !important; font-weight:600 !important;">Are you sure want to verify?</span>
                                        <input type="text" name="offer_id" value="{{ $offer->id }}" hidden>
                                        <input type="text" name="offer_status" value="1" hidden>
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

        @endforeach
    @endif
    
    <script>

        let map, marker;

        function initMap(lot, area, city, district, state, region, latitude, longitude) {
            let defaultLocation;

            // Check if latitude and longitude are provided
            if (latitude && longitude) {
                // Use the provided coordinates
                defaultLocation = { lat: parseFloat(latitude), lng: parseFloat(longitude) };
            } else {
                // Construct the full address
                const fullAddress = `${lot}+${area},+${city},+${district},+${state},+${region}`;

                // Build the API URL
                const apiKey = '{{ env('GOOGLE_MAPS_API_KEY') }}'; // Ensure you have the API key in .env
                const geocodeUrl = `https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(fullAddress)}&key=${apiKey}`;

                console.log('geo code ' + geocodeUrl);

                // Fetch geolocation
                fetch(geocodeUrl)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'OK') {
                            const location = data.results[0].geometry.location;
                            defaultLocation = { lat: location.lat, lng: location.lng };

                            // Set the latitude and longitude to the input fields
                            $('#latitude').val('');
                            $('#longitude').val('');
                            $('#latitude').val(defaultLocation.lat);
                            $('#longitude').val(defaultLocation.lng);

                            // Initialize the map
                            initializeMap(defaultLocation);

                            toastr.success(`Default location : ${data.results[0].formatted_address}`);

                        } else {
                            alert('Geocoding failed: ' + data.status);
                        }
                    })
                    .catch(error => console.error('Error fetching geolocation:', error));

                return; // Exit the function since we are waiting for geocoding results
            }

            // If coordinates are provided, initialize the map immediately
            initializeMap(defaultLocation);

            toastr.success(`Requester location : {{ $detail->full_address }}`);

        }
        
        // Helper function to initialize the map
        function initializeMap(location) {
            // Initialize the map
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 18,
                center: location,
                mapTypeId: 'roadmap',
            });

            // Add a marker at the location
            marker = new google.maps.Marker({
                position: location,
                map: map,
                title: '{{ $detail->full_address }}'
            });

        }

        // Initialize the map on page load (with a default location or as needed)
        $(document).ready(function() {
            initMap('', '', '', '', '', '', '{{ $detail->latitude_map }}', '{{ $detail->longitude_map }}'); // You may want to set a default location or use previous values
        });
        
    </script>

</x-app-layout>
