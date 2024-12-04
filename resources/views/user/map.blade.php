<x-app-layout>
    <style>
        #map {
            height: 800px !important;
            width: 100%;
        }
    </style>

    <div class="row" style="background-color:#FDFCF7 !important;">
        <div class="col-md-12 col-12">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12 background-col-map">
            <span class="map_header">Map</span>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="position: relative;">
            <div class="row m-0">
                <div class="col-md-6 col-6">
                    <input type="text" name="latitude" id="latitude" class="form-control" hidden>
                </div>
                <div class="col-md-6 col-6">
                    <input type="text" name="longitude" id="longitude" class="form-control" hidden>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-md-12 col-12 p-0">
                    <div id="map" style="height:800px !important; width:100%;"></div>
                </div>
            </div>
            <!-- Button Overlay -->
            <div class="button-overlay" style="position: absolute; top: 680px; left: 50%; transform: translateX(-50%); z-index: 1000; width: 90%; text-align: center;">
                <div class="row">
                    <div class="col-md-6 col-6 d-flex justify-content-center">
                        <a href="{{ route('user.request_help') }}" class="btn-orange" style="font-size:24pt; font-weight:600 !important; min-width:300px !important; border-radius:30px !important; display:flex !important; align-items:center !important; justify-content:center !important; width:400px !important;">I need help!&nbsp;&nbsp;<i class="fa-solid fa-flag"></i></a>
                    </div>
                    <div class="col-md-6 col-6 d-flex justify-content-center">
                        <a href="{{ route('user.browse_request') }}" class="btn-green" style="font-size:24pt; font-weight:600 !important; min-width:300px !important; border-radius:30px !important; display:flex !important; align-items:center !important; justify-content:center !important; width:400px !important;">I want to help!&nbsp;&nbsp;<i class="fa-solid fa-hand-holding-medical"></i></a>
                    </div>
                </div>
            </div>
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
    <div class="modal fade" id="viewRequestHelp" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="justify-content:center !important;">
            <div class="modal-content" style="background-color:rgba(255,255,255,0.9); border-radius:50px !important; width:400px !important;">
                <div class="modal-header" style="justify-content:center !important;">
                    <span class="modal-title" id="staticBackdropLabel" style="font-weight:bold !important; font-size:16pt !important;"></span>
                </div>
                <div class="modal-body" style="font-size:13pt !important;">
                    <div class="row mb-3 mx-0 justify-content-center">
                        <div class="col-md-10 d-flex align-items-center justify-content-center map_modal_category">
                            <span id="modal_category"></span>
                        </div>
                    </div>
                    <div class="row mb-3 mx-0 justify-content-center">
                        <div class="col-md-10 d-flex align-items-center justify-content-center map_modal_detail">
                            <span id="modal_detail"></span>
                        </div>
                    </div>
                    <div class="row mb-3 mx-0 justify-content-center">
                        <div class="col-md-10 d-flex align-items-center justify-content-center map_modal_detail">
                            <span id="modal_quantity"></span>
                        </div>
                    </div>
                    <div class="row mb-3 mx-0 justify-content-center">
                        <div class="col-md-10 d-flex align-items-center justify-content-center map_modal_detail">
                            <span id="modal_urgent"></span>
                        </div>
                    </div>
                    <div class="row mb-3 mx-0 justify-content-center">
                        <div class="col-md-10 d-flex align-items-center justify-content-center map_modal_address">
                            <i class="fa-solid fa-location-dot" style="color:#E06464 !important;"></i>&nbsp;<span id="modal_address"></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <a href="" class="btn-orange" id="send_help_btn">
                                Send Help
                            </a>
                        </div>
                    </div>
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

            // Fetch data via AJAX and populate dummyLocations
            $.ajax({
                url: "{{ route('get_approved_request') }}",
                type: "GET",
                success: function(response) {
                    if (response.data && response.data.length > 0) {
                        toastr.success('There are ' + response.data.length + ' requesting help approved recorded.', 'Found');

                        const dummyLocations = [];
                        response.data.forEach(function(request_help) {
                            dummyLocations.push({
                                id: request_help.id,
                                request_number: request_help.request_number,
                                category: request_help.category,
                                details: request_help.details,
                                quantity: request_help.quantity,
                                urgent: request_help.urgent,
                                lat: request_help.latitude_map,
                                lng: request_help.longitude_map,
                                title: request_help.full_address
                            });
                        });

                        // Add markers to the map
                        addMarkersToMap(dummyLocations, map);
                    } else {
                        toastr.error('No requesting help approved are recorded yet.');
                    }
                },
                error: function(response) {
                    alert(response);
                }
            });

            // Add a double-click event listener to the map
            // map.addListener('dblclick', (event) => {
            //     // Ensure the event provides valid coordinates
            //     if (event.latLng && typeof event.latLng.lat === 'function' && typeof event.latLng.lng === 'function') {
            //         const latitude = Number(event.latLng.lat());
            //         const longitude = Number(event.latLng.lng());

            //         // Check if the values are valid numbers
            //         if (!isNaN(latitude) && !isNaN(longitude)) {
            //             // Update the latitude and longitude input fields using jQuery
            //             $('#latitude').val(latitude);
            //             $('#longitude').val(longitude);

            //             console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);

            //             // Update marker position
            //             if (marker) {
            //                 marker.setPosition({ lat: latitude, lng: longitude });
            //             } else {
            //                 // Create a new marker if it doesn't exist
            //                 marker = new google.maps.Marker({
            //                     position: { lat: latitude, lng: longitude },
            //                     map: map,
            //                     title: 'Selected Location',
            //                 });
            //             }
            //         } else {
            //             console.error('Invalid latitude or longitude values:', { latitude, longitude });
            //         }
            //     } else {
            //         console.error('Invalid event data: Missing latLng properties.');
            //     }
            // });

        }

        // Function to add markers to the map
        function addMarkersToMap(locations, map) {
            // console.log('location', JSON.stringify(locations, null, 2));

            locations.forEach((location) => {
                // Convert lat and lng to numbers
                const latitude = parseFloat(location.lat);
                const longitude = parseFloat(location.lng);

                // Validate lat and lng
                if (isNaN(latitude) || isNaN(longitude)) {
                    console.error('Invalid lat/lng:', location);
                    return; // Skip this location
                }

                // Create a custom marker using Font Awesome icon
                const markerIcon = {
                    url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(`
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="32" height="32" class="request_help_view_btn" id="request_help_${location.id}">
                        <!--! Font Awesome Free 6.7.1 -->
                        <path fill="#FF0000" d="M64 32C64 14.3 49.7 0 32 0S0 14.3 0 32L0 64 0 368 0 480c0 17.7 14.3 32 32 32s32-14.3 32-32l0-128 64.3-16.1c41.1-10.3 84.6-5.5 122.5 13.4c44.2 22.1 95.5 24.8 141.7 7.4l34.7-13c12.5-4.7 20.8-16.6 20.8-30l0-247.7c0-23-24.2-38-44.8-27.7l-9.6 4.8c-46.3 23.2-100.8 23.2-147.1 0c-35.1-17.6-75.4-22-113.5-12.5L64 48l0-16z"/>
                        </svg>`),
                    scaledSize: new google.maps.Size(32, 32), // Scale the SVG
                };

                // Create a new marker with the custom icon
                const marker = new google.maps.Marker({
                    position: { lat: latitude, lng: longitude },
                    map: map,
                    title: location.title,
                    icon: markerIcon,
                });

                // Add click event listener to trigger modal
                google.maps.event.addListener(marker, 'click', function() {
                    // Trigger the modal programmatically using jQuery
                    const modalId = '#viewRequestHelp';
                    const modalElement = $(modalId); // Use jQuery to select the modal
                    if (modalElement.length) {
                        const modal = new bootstrap.Modal(modalElement[0]); // Pass the DOM element to bootstrap.Modal
                        modal.show();

                        $('.modal-title').empty();
                        $('.modal-title').append(location.request_number);

                        if(location.category == 'food'){
                            $('#modal_category').empty();
                            $('#modal_category').append('Food');
                        }
                        else if(location.category == 'medical'){
                            $('#modal_category').empty();
                            $('#modal_category').append('Medical Aid');

                        }
                        else if(location.category == 'academic'){
                            $('#modal_category').empty();
                            $('#modal_category').append('Academic<br>Resources');

                        }
                        else{
                            $('#modal_category').empty();
                            $('#modal_category').append('Financial<br>Support');

                        }

                        $('#modal_detail').empty();
                        $('#modal_detail').append(location.details);

                        $('#modal_quantity').empty();
                        $('#modal_quantity').append(location.quantity);

                        if(location.urgent == 'yes'){

                            $('#modal_urgent').empty();
                            $('#modal_urgent').append('Urgent');

                        }
                        else{

                            $('#modal_urgent').empty();
                            $('#modal_urgent').append('Not Urgent');

                        }

                        $('#modal_address').empty();
                        $('#modal_address').append(location.title);

                        $('#send_help_btn').attr('href', '');
                        $('#send_help_btn').attr('href', '{{ route("user.offer_help", ":id") }}'.replace(':id', location.id));

                    }
                });

            });
        }

        // Initialize the map on page load (with a default location or as needed)
        $(document).ready(function() {
            initMap('Internation Islamic University Malaysia', '', 'Jln Gombak', 'Gombak', 'Kuala Lumpur', 'MY', '', ''); // You may want to set a default location or use previous values
        });
        
    </script>

</x-app-layout>
