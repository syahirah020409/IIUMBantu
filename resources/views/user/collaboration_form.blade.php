<x-app-layout>
    <style>

        ul {
            list-style-type: disc !important; /* Default bullet style */
            padding-left: 20px;    /* Ensure there's space for the bullets */
        }

    </style>

    <div class="row" style="background-color:#FDFCF7 !important;">
        <div class="col-md-12 col-12">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12 background-col-donation">
            <div class="row justify-content-center" style="margin-top: 50px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-end">
                    <a href="" class="btn-grey" style="font-size:20pt !important; font-weight:600 !important;">Collab With Us</a>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 100px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <span class="donation_header">Donation</span>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 20px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <span class="donation_header_1">IIUMBantu X IIUM Club</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="height:auto !important; background-color:#FDFCF7 !important; padding:100px 0px 100px 0px !important;">
            <div class="row m-0 justify-content-center">
                <div class="col-md-8 col-8" style="padding:50px !important; border-radius:50px !important; background-color:#166269 !important;">
                    <div class="row justify-content-end">
                        <div class="col-md-6 col-6 text-end">
                            <span class="collab_1">
                                Let's<br>Collab!
                            </span>
                        </div>
                    </div>
                    <form action="{{ route('user.submit_collab_donation') }}" method="POST" id="collabForm" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-8">
                                <label for="name" class="collab_label">PROGRAM'S NAME *</label>
                                <input type="text" name="requester_id" value="{{ $requester->id }}" hidden>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Please fill program's name.." style="border-radius:15px !important; font-size:18pt !important;" required>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin-top:30px !important;">
                            <div class="col-md-8 col-8">
                                <label for="description" class="collab_label">EXPLAIN BRIEFLY ABOUT THIS PROGRAM *</label>
                                <textarea name="description" rows="5" id="description" class="form-control" placeholder="Please fill program's descriptions / details.." style="border-radius:15px !important; font-size:18pt !important;" required></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin-top:30px !important;">
                            <div class="col-md-8 col-8">
                                <label for="target_amount" class="collab_label">TARGET DONATION AMOUNT *</label>
                                <input type="number" name="target_amount" id="target_amount" class="form-control" placeholder="Please fill program's target donation amount.." style="border-radius:15px !important; font-size:18pt !important;" required>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin-top:30px !important;">
                            <div class="col-md-8 col-8">
                                <label for="donation_for" class="collab_label">WHAT'S THE DONATION FOR ?</label>
                                <input type="text" name="donation_for" id="donation_for" class="form-control" placeholder="Please fill donation for.. separate by using comma (,)" style="border-radius:15px !important; font-size:18pt !important;">
                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin-top:30px !important;">
                            <div class="col-md-8 col-8">
                                <label for="poster" class="collab_label">IMPORT THE DONATION POSTER *</label>
                                <input type="file" name="poster" id="poster" class="form-control" style="border-radius:15px !important; font-size:18pt !important; background:#fff !important; height:53px !important; line-height:53px !important;" required>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin-top:30px !important;">
                            <div class="col-md-8 col-8">
                                <label for="background" class="collab_label">IMPORT BACKGROUND IMAGE FOR TITLE DISPLAY *</label>
                                <input type="file" name="background" id="background" class="form-control" style="border-radius:15px !important; font-size:18pt !important; background:#fff !important; height:53px !important; line-height:53px !important;" required>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin-top:30px !important; margin-bottom:30px !important;">
                            <div class="col-md-8 col-8 text-center">
                                <button type="submit" class="btn-orange" style="font-size:16pt !important; font-weight:600px !important;">Submit</button>
                            </div>
                        </div>
                    </form>
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

    
    <script>

        $(document).ready(function(){

            console.log('loaded');

            // Attach a submit event handler to the form
            $('#collabForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                console.log('test');

                let isValid = true; // Initialize validity flag

                // Validate each input field
                $('#collabForm input, #collabForm textarea').each(function () {
                    let fieldName = $(this).attr('name') || "This field"; // Get field name or default to "This field"

                    // Validate file inputs separately
                    if (this.type === "file") {
                        if (this.required && this.files.length === 0) {
                            isValid = false;
                            Swal.fire({
                                icon: 'warning',
                                title: 'Missing File',
                                text: `Please upload a file for "${fieldName}".`,
                            });
                            this.focus(); // Focus the field
                            return false; // Break the loop on the first invalid field
                        }
                    } else {
                        // Validate other inputs and textareas
                        if (!this.checkValidity()) {
                            isValid = false;
                            Swal.fire({
                                icon: 'warning',
                                title: 'Invalid Input',
                                text: `Please fill out "${fieldName}".`,
                            });
                            this.focus(); // Focus the field
                            return false; // Break the loop on the first invalid field
                        }
                    }
                });

                // If the form is valid, submit it
                if (isValid) {
                    this.submit(); // Proceed with form submission
                }
            });

        });
        
    </script>

</x-app-layout>
