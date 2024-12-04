<x-app-layout>
    <style>

        #map {
            height: 500px !important;
            width: 100%;
        }

        .search-results-container {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }
        .search-result-row {
            background-color: #fff;
            transition: background-color 0.3s;
        }
        .search-result-row:hover {
            background-color: #f0f0f0;
        }
        .search-results td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .search-results td:last-child {
            border-bottom: none;
        }

    </style>

    <div class="row" style="background-color:#D5993F !important;">
        <div class="col-md-12 col-12">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12" style="background:#D5993F !important; height:200px !important;">
            <div class="row justify-content-center" style="margin-top: 100px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <span class="help_header">Get Help</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="height:auto !important; background-color:#D5993F !important;">
            <form id="getHelpForm" action="{{ route('user.submit_request_help') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Section 1 -->
                <div class="form-section" id="section1">
                    <div class="row m-0 justify-content-center" style="margin-top: 20px !important; margin-bottom:50px !important;">
                        <div class="col-md-10 col-10 d-flex justify-content-center">
                            <span class="help_header_1">What do you need?</span>
                        </div>
                    </div>
                    <div class="row m-0 justify-content-center">
                        <div class="col-md-10 col-10" style="border-radius:50px !important; background-color:#FDFCF7 !important; margin-bottom:100px !important; padding:50px 0px 50px 0px !important;">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-8 d-flex justify-content-center">
                                    @if(isset($category))
                                        @if($category == 'food')
                                            <span class="help_form_category">Food</span>
                                        @elseif($category == 'medical')
                                            <span class="help_form_category">Medical Aid</span>
                                        @elseif($category == 'academic')
                                            <span class="help_form_category">Academic<br>Resources</span>
                                        @else
                                            <span class="help_form_category">Financial<br>Support</span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin-top:50px !important; margin-bottom:80px !important;">
                                <div class="col-md-7 col-7">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="row m-0">
                                                <div class="col-md-12 col-12 p-0">
                                                    <label for="details" class="request_help_label">Details *</label>
                                                    <input type="text" name="requester_id" value="{{ $requester->id }}" hidden required>
                                                    <input type="text" name="category" value="{{ $category }}" hidden required>
                                                    <input type="text" name="details" id="details" class="form-control" placeholder="Please fill details.." style="background-color:#D9D9D9 !important; font-size:18pt !important; border:none !important;" required>
                                                </div>
                                            </div>
                                            <div class="row m-0" style="margin-top:30px !important;">
                                                <div class="col-md-12 col-12 p-0">
                                                    <label for="quantity" class="request_help_label">Quantity *</label>
                                                    @if($category == 'financial')
                                                        <input type="number" name="quantity" id="quantity" max="50" class="form-control" placeholder="Please fill quantity.. 20 / 30" style="background-color:#D9D9D9 !important; font-size:18pt !important; border:none !important;" required>
                                                    @else
                                                        <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Please fill quantity.. 1 pack / 1 piece" style="background-color:#D9D9D9 !important; font-size:18pt !important; border:none !important;" required>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row m-0" style="margin-top:30px !important;">
                                                <div class="col-md-12 col-12 p-0">
                                                    <label for="urgent" class="request_help_label">Is your need urgent? Yes / No *</label>
                                                    <select name="urgent" id="urgent" class="form-control" style="background-color:#D9D9D9 !important; font-size:18pt !important; border:none !important;" required>
                                                        <option value="">Please Select Yes / No</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row m-0" style="margin-top:30px !important;">
                                                <div class="col-md-12 col-12 p-0">
                                                    <label for="phone_number" class="request_help_label">Phone Number *</label>
                                                    <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Please fill phone number.." value="{{ $requester->phone_number ? $requester->phone_number : '' }}" style="background-color:#D9D9D9 !important; font-size:18pt !important; border:none !important;" required>
                                                </div>
                                            </div>
                                            <div class="row m-0" style="margin-top:30px !important;">
                                                <div class="col-md-12 col-12 p-0">
                                                    <label for="proofImage" class="request_help_label">Import your proof *</label><br>
                                                    <button type="button" class="upload-proof-trigger" style="border-radius:20px !important; padding:10px 20px 10px 20px !important; font-weight:500 !important; background-color:#D9D9D9 !important">Upload file</button>
                                                    <input type="file" id="proofImage" name="proof" class="form-control d-none" style="border-radius:15px !important;" accept="image/*" required>
                                                    <div id="fileName_proof" class="text-center mt-2 d-none"></div> <!-- File name will appear here -->
                                                </div>
                                            </div>
                                            <div class="row m-0" style="margin-top:30px !important;">
                                                <div class="col-md-12 col-12 p-0">
                                                    <label for="qrcodeImage" class="request_help_label">Import your QR code *</label><br>
                                                    <button type="button" class="upload-qr-trigger" style="border-radius:20px !important; padding:10px 20px 10px 20px !important; font-weight:500 !important; background-color:#D9D9D9 !important">Upload file</button>
                                                    <input type="file" id="qrcodeImage" name="qr_code" class="form-control d-none" style="border-radius:15px !important;" accept="image/*" required>
                                                    <div id="fileName_qrcode" class="text-center mt-2 d-none"></div> <!-- File name will appear here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-3 col-3 d-flex justify-content-between">
                                    <a href="{{ route('user.request_help') }}" class="btn_grey_mini">Back</a>
                                    <button type="button" class="btn_grey_mini next-btn" data-next="section2">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="form-section d-none" id="section2">
                    <div class="row m-0 justify-content-center" style="margin-top: 20px !important; margin-bottom:50px !important;">
                        <div class="col-md-10 col-10 d-flex justify-content-center">
                            <span class="help_header_1">Confirm your location</span>
                        </div>
                    </div>
                    <div class="row m-0 justify-content-center">
                        <div class="col-md-10 col-10" style="border-radius:50px !important; background-color:#FDFCF7 !important; margin-bottom:100px !important; padding:50px 0px 50px 0px !important;">
                            <div class="row justify-content-center" style="margin-top:50px !important; margin-bottom:80px !important;">
                                <div class="col-md-10 col-10">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div id="map" style="height:500px !important; width:100%;"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <input type="text" name="latitude_map" id="latitude" class="form-control" hidden required>
                                                    <input type="text" name="longitude_map" id="longitude" class="form-control" hidden required>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:30px !important;">
                                                <div class="col-md-12 col-12">
                                                    <label for="full_address" class="request_help_label">Address Details *</label>
                                                    <div class="" style="width: 100%; display: flex; align-items: center; position: relative;">
                                                        <input type="text" name="full_address" id="full_address" class="form-control" placeholder="Please fill address details / building / landmark.." style="background-color:#D9D9D9 !important; font-size:18pt !important; border:none !important;" required>
                                                        <div class="search-results-container" style="position: absolute; width: 100%; z-index: 1000; top: 100%;">
                                                            <table class="search-results table" id="search-results" style="display: none; background-color: #fff; border: 1px solid #ccc; border-radius: 4px; margin-bottom:0px !important;">
                                                                <!-- Results will be appended here -->
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-3 col-3 d-flex justify-content-between">
                                    <button type="button" class="btn_grey_mini prev-btn" data-prev="section1">Back</button>
                                    <button type="button" class="btn_grey_mini next-btn" data-next="section3">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 3 -->
                <div class="form-section d-none" id="section3">
                    <div class="row m-0 justify-content-center" style="margin-top: 20px !important; margin-bottom:50px !important;">
                        <div class="col-md-10 col-10 d-flex justify-content-center">
                            <span class="help_header_1">Intergrity Declaration</span>
                        </div>
                    </div>
                    <div class="row m-0 justify-content-center">
                        <div class="col-md-10 col-10" style="border-radius:50px !important; background-color:#FDFCF7 !important; margin-bottom:50px !important; padding:0px 0px 0px 0px !important;">
                            <div class="row">
                                <div class="col-md-6 col-6 shadow" style="border-radius:50px !important; background-color:#DAC769 !important; padding:50px 50px 50px 50px !important;">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="row">
                                                <div class="col-md-12 col-12 d-flex justify-content-center">
                                                    <span style="font-size:24pt !important; font-weight:bold !important; color:#FDFCF7 !important;">Intergrity Declaration</span>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:20px !important;">
                                                <div class="col-md-12 col-12">
                                                    <span style="font-size:19pt !important; font-weight:500 !important; color:#FDFCF7 !important; text-align:justify !important;">
                                                        By using the IIUMBantu platform, I solemnly declare that I will adhere to the principles of honesty and 
                                                        integrity. I commit to the following:
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:30px !important; margin-bottom:10px !important;">
                                                <div class="col-md-12 col-12">
                                                    <span style="font-size:19pt !important; font-weight:bold !important; color:#FDFCF7 !important; text-align:justify !important;">
                                                        1. Request Help Only When in Genuine Need:
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-12" style="padding-left:30px !important;">
                                                    <span style="font-size:19pt !important; font-weight:500 !important; color:#FDFCF7 !important; text-align:justify !important;">
                                                        I will request assistance only when I am truly in 
                                                        need and not for personal gain at the expense of others.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:30px !important; margin-bottom:10px !important;">
                                                <div class="col-md-12 col-12">
                                                    <span style="font-size:19pt !important; font-weight:bold !important; color:#FDFCF7 !important; text-align:justify !important;">
                                                        2. Provide Accurate Information:
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-12" style="padding-left:30px !important;">
                                                    <span style="font-size:19pt !important; font-weight:500 !important; color:#FDFCF7 !important; text-align:justify !important;">
                                                        I will provide truthful and accurate information in 
                                                        all my requests and communications on the platform.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:30px !important; margin-bottom:10px !important;">
                                                <div class="col-md-12 col-12">
                                                    <span style="font-size:19pt !important; font-weight:bold !important; color:#FDFCF7 !important; text-align:justify !important;">
                                                        3. Respect the Rights of Others:
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-12" style="padding-left:30px !important;">
                                                    <span style="font-size:19pt !important; font-weight:500 !important; color:#FDFCF7 !important; text-align:justify !important;">
                                                        I acknowledge that my actions impact the rights and resources of 
                                                        fellow students. I will not misuse the platform, ensuring that others 
                                                        who may be in genuine need are not deprived of assistance.
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6" style="padding:50px 50px 50px 50px !important;">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="row" style="margin-top:120px !important; margin-bottom:10px !important;">
                                                <div class="col-md-12 col-12">
                                                    <span style="font-size:19pt !important; font-weight:bold !important; color:#B39A1A !important; text-align:justify !important;">
                                                        4. Avoid Deceitful Behavior:
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-12" style="padding-left:30px !important;">
                                                    <span style="font-size:19pt !important; font-weight:500 !important; color:#B39A1A !important; text-align:justify !important;">
                                                        I will refrain from any form of deceit or false claims, understanding 
                                                        that such behavior undermines the purpose of IIUMBantu.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:30px !important; margin-bottom:10px !important;">
                                                <div class="col-md-12 col-12">
                                                    <span style="font-size:19pt !important; font-weight:bold !important; color:#B39A1A !important; text-align:justify !important;">
                                                        5. Act with Integrity:
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-12" style="padding-left:30px !important;">
                                                    <span style="font-size:19pt !important; font-weight:500 !important; color:#B39A1A !important; text-align:justify !important;">
                                                        I will act with integrity in all my interactions on the platform, 
                                                        maintaining a high standard of ethical conduct.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:30px !important; margin-bottom:10px !important;">
                                                <div class="col-md-12 col-12" style="text-align:center !important;">
                                                    <span style="font-size:19pt !important; font-weight:600 !important; color:#B39A1A !important; text-align:center !important;">
                                                        وَلَا تَلْبِسُوا الْحَقَّ بِالْبَاطِلِ وَتَكْتُمُوا الْحَقَّ وَأَنْتُمْ تَعْلَمُونَ 
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-12" style="padding-left:30px !important; text-align:center !important;">
                                                    <span style="font-size:15pt !important; font-weight:500 !important; color:#B39A1A !important; text-align:center !important;">
                                                        "And do not mix the truth with falsehood or<br>conceal the truth while you know [it]"<br>
                                                        (Quran 2:42)
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:30px !important; margin-bottom:10px !important;">
                                                <div class="col-md-12 col-12">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-1 col-1 d-flex align-items-center justify-content-center">
                                                            <input type="checkbox" name="declaration" value="1" class="form-control" style="border:2px solid #D5993F !important; width:30px !important; height:30px !important; border-radius:5px !important;" required>
                                                        </div>
                                                        <div class="col-md-10 col-10">
                                                            <span style="font-size:13pt !important; font-weight:500 !important; color:#575757 !important; text-align:center !important; line-height:1 !important;">
                                                                By agreeing to this declaration, I affirm my commitment<br>to these values and principles.
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 justify-content-center" style="margin-bottom:50px !important;">
                        <div class="col-md-3 col-3 d-flex justify-content-between">
                            <button type="button" class="btn_grey_mini prev-btn" data-prev="section2">Back</button>
                            <button type="submit" class="btn_grey_mini">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
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

            toastr.success(`Default location : ${data.results[0].formatted_address}`);

        }
        
        // Helper function to initialize the map
        function initializeMap(location) {
            // Initialize the map
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 18,
                center: location,
                mapTypeId: 'roadmap',
            });

            // Add a draggable marker at the location
            const marker = new google.maps.Marker({
                position: location,
                map: map,
                title: 'Default Location',
                draggable: true, // Enable drag-and-drop
            });

            // jQuery event listener for marker drag end
            google.maps.event.addListener(marker, 'dragend', function () {
                const position = marker.getPosition();
                $('#latitude').val(position.lat());
                $('#longitude').val(position.lng());
            });

            // jQuery event listener for double-click on the map
            map.addListener('dblclick', function (event) {
                // Update the marker's position to the clicked location
                marker.setPosition(event.latLng);

                // Update the latitude and longitude input fields
                $('#latitude').val(event.latLng.lat());
                $('#longitude').val(event.latLng.lng());
            });
        }

        $(document).ready(function(){
            
            const sections = $('.form-section').length;

            $('.upload-proof-trigger').on('click', function () {
                $('#proofImage').trigger('click'); // Simulate a click on the file input
            });

            $('.upload-qr-trigger').on('click', function () {
                $('#qrcodeImage').trigger('click'); // Simulate a click on the file input
            });

            $('#proofImage').on('change', function () {
                const fileName = $(this).val().split('\\').pop(); // Extract file name

                if (fileName) {
                    
                    // Show the file name below the icon
                    $('#fileName_proof').removeClass('d-none').text(fileName);
                } else {
                    
                    $('#fileName_proof').addClass('d-none');
                }
            });

            $('#qrcodeImage').on('change', function () {
                const fileName = $(this).val().split('\\').pop(); // Extract file name

                if (fileName) {
                    
                    // Show the file name below the icon
                    $('#fileName_qrcode').removeClass('d-none').text(fileName);
                } else {
                    
                    $('#fileName_qrcode').addClass('d-none');
                }
            });

            function validateCurrentSection(sectionId) {
                let isValid = true;

                // Check all inputs and textareas in the current section
                $(`#${sectionId} input, #${sectionId} select`).each(function () {
                    let fieldName = $(this).attr('name'); // Get the field name (if present)
                    
                    // If no name attribute, use a custom label (if available)
                    if (!fieldName) {
                        fieldName = $(this).closest('div').find('label').text() || "This field"; // Default to "This field"
                    }

                    if (this.type === "file") {
                        // Custom validation for file inputs
                        if (this.required && this.files.length === 0) {
                            isValid = false;
                            Swal.fire({
                                icon: 'warning',
                                title: 'Missing File',
                                text: `Please upload a file for the field "${fieldName}".`,
                            });
                            this.focus(); // Focus the file input field
                            return false; // Exit the loop on the first invalid file input
                        }
                    } else {
                        // Standard validation for other inputs and selects
                        if (!this.checkValidity()) {
                            isValid = false;

                            if(fieldName == 'quantity'){

                                // Custom message using the input's validation message or a default message
                                var errorMessage = `Please check amount "${fieldName}" maximum for financial support request is RM 50.`;

                            }
                            else{

                                // Custom message using the input's validation message or a default message
                                var errorMessage = `Please fill out the field "${fieldName}".`;

                            }

                            Swal.fire({
                                icon: 'warning',
                                title: 'Invalid Input',
                                text: errorMessage,
                            });

                            this.focus(); // Focus the invalid input
                            return false; // Exit the loop on the first invalid input
                        }
                    }

                });

                return isValid;
            }

            $('.next-btn').on('click', function () {
                const currentSection = $(this).closest('.form-section').attr('id');
                const nextSection = $(this).data('next');

                if (validateCurrentSection(currentSection)) {
                    // Hide current section and show next section
                    $(this).closest('.form-section').addClass('d-none');
                    $(`#${nextSection}`).removeClass('d-none');
                
                }
            });

            $('.prev-btn').on('click', function () {
                const currentSection = $(this).closest('.form-section').attr('id');
                const prevSection = $(this).data('prev');

                // Navigate back without validation
                $(this).closest('.form-section').addClass('d-none');
                $(`#${prevSection}`).removeClass('d-none');
                
            });


            initMap('Internation Islamic University Malaysia', '', 'Jln Gombak', 'Gombak', 'Kuala Lumpur', 'MY', '', ''); // You may want to set a default location or use previous values

            // $(document).on('keyup change', '#full_address', function(){

            //     var full_address = $(this).val();
                
            //     console.log('test '+full_address);

            //     $.ajax({
            //         url: "{{ route('find_full_address') }}",
            //         type: "GET",
            //         data: {
            //             full_address : full_address
            //         },
            //         success: function(response) {
            //             // console.log('data' +response.data);
            //             if (response.data && response.data.length > 0) {
            //                 toastr.success('There a few address found in request help reocrd.', 'Found');
            //                 $('#search-results').empty().show();
            //                 $('#search-results').css('border', '1px solid #ccc');

            //                 var rows = '';
            //                 response.data.forEach(function(request_help) {
            //                     var fullAddress = request_help.full_address;
            //                     var addressLatitude = request_help.latitude_map;
            //                     var addressLongitude = request_help.longitude_map;
            //                     rows += `
            //                         <tr class="search-result-row" data-full_address="${fullAddress}" data-latitude="${addressLatitude}" data-longitude="${addressLongitude}" style="cursor: pointer; height: 43px; margin-top: 5px;">
            //                             <td style="padding: 10px; border: 1px solid #ccc;">${fullAddress}</td>
            //                         </tr>`;
            //                 });

            //                 $('#search-results').append(rows);

            //                 $('.search-result-row').on('click', function() {
            //                     var selectedAddress = $(this).data('full_address');
            //                     var selectedLatitude = $(this).data('latitude');
            //                     var selectedLongitude = $(this).data('longitude');
            //                     console.log('latitude & longitude ' + selectedLatitude + ' & ' + selectedLongitude);
                                
            //                     $('#full_address').val(selectedAddress);
            //                     $('#latitude').val(selectedLatitude);
            //                     $('#longitude').val(selectedLongitude);

            //                     $('#search-results').empty().hide();
            //                 });

            //             } else {
            //                 $('#search-results').empty().hide();
            //                 toastr.error('This address are not recorded yet in request help record.');
            //             }


            //         },
            //         error: function(response) {
            //             alert(response);
            //         }
            //     });

            // });

        });
        
    </script>

</x-app-layout>
