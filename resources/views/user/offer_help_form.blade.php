<x-app-layout>
    <style>
        /* For most modern browsers */
        input[type="number"]::-webkit-inner-spin-button, 
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* For Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }

    </style>

    <div class="row">
        <div class="col-md-12 col-12">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12" style="height:200px !important;">
            <div class="row justify-content-center" style="margin-top: 100px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <span class="help_header">Send Help</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="height:auto !important;">
            <form id="sendHelpForm" action="{{ route('user.submit_send_help') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Section 1 -->
                <div class="form-section" id="section1">
                    <div class="row m-0 justify-content-center" style="margin-top: 20px !important; margin-bottom:50px !important;">
                        <div class="col-md-10 col-10 d-flex justify-content-center" style="text-align:center !important;">
                            <span class="help_header_1">Please enter the amount/quantity<br>you’d wish to give</span>
                        </div>
                    </div>
                    <div class="row m-0 justify-content-center">
                        <div class="col-md-6 col-6" style="border-radius:50px !important; background-color:#FDFCF7 !important; margin-bottom:60px !important; padding:50px 50px 50px 50px !important;">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-8 d-flex justify-content-center">
                                    <span class="help_form_type">Quantity</span>
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin-top:50px !important; margin-bottom:50px !important;">
                                <div class="col-md-5 col-5">
                                    <input type="text" name="helper_id" value="{{ $helper->id }}" hidden required>
                                    <input type="text" name="request_id" value="{{ $help->id }}" hidden required>
                                    <input type="text" name="help_type" value="{{ $help_type }}" hidden required>
                                    @if($help->category == 'financial')
                                        <input type="number" name="quantity" id="quantity" max="{{ $help->quantity }}" class="form-control" placeholder="20 /30" style="background-color:#D9D9D9 !important; font-size:18pt !important; border:none !important; height:70px !important; line-height:70px !important; border-radius:35px !important; text-align:center !important;" required>
                                    @else
                                        <input type="text" name="quantity" id="quantity" class="form-control" placeholder="1 pack / 1 piece" style="background-color:#D9D9D9 !important; font-size:18pt !important; border:none !important; height:70px !important; line-height:70px !important; border-radius:35px !important; text-align:center !important;" required>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-12 d-flex justify-content-end">
                                    <button type="button" class="btn_grey_mini next-btn" data-next="section2">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 justify-content-center" style="margin-top: 20px !important; margin-bottom:50px !important;">
                        <div class="col-md-9 col-9">
                            <a href="{{ route('user.offer_help', $help->id) }}" class="btn_white_arrow"><i class="fa-solid fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="form-section d-none" id="section2">
                    <div class="row m-0 justify-content-center" style="margin-top: 20px !important; margin-bottom:50px !important;">
                        <div class="col-md-10 col-10 d-flex justify-content-center">
                            @if($help_type == 'in_person')
                                <span class="help_header_1">Contact the requester by clicking the link below.</span>
                            @else
                                <span class="help_header_1">Scan the QR Code below to make transaction.</span>
                            @endif
                        </div>
                    </div>
                    <div class="row m-0 justify-content-center">
                        <div class="col-md-6 col-6" style="border-radius:50px !important; background-color:#FDFCF7 !important; margin-bottom:60px !important; padding:50px 50px 50px 50px !important;">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-8 d-flex justify-content-center">
                                    @if($help_type == 'in_person')
                                        <span class="help_form_type">In Person</span>
                                    @else
                                        <span class="help_form_type">Online Transfer</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin-top:50px !important; margin-bottom:50px !important;">
                                @if($help_type == 'in_person')
                                    <a href="https://wa.me/+6{{ $help->phone_number }}" class="col-md-5 col-5" target="_blank" style="background-color:#D9D9D9 !important; font-size:18pt !important; border:none !important; height:70px !important; line-height:70px !important; border-radius:35px !important; text-align:center !important;">Whatsapp</a>
                                @else
                                    <div class="col-md-4 col-4">
                                        <img src="{{asset('web_image/iium_qr_code.png')}}" alt="" style="width:100% !important; height:auto !important;">
                                    </div>
                                @endif
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-12 d-flex justify-content-end">
                                    <button type="button" class="btn_grey_mini next-btn" data-next="section3">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 justify-content-center" style="margin-top: 20px !important; margin-bottom:50px !important;">
                        <div class="col-md-9 col-9">
                            <button type="button" class="btn_white_arrow prev-btn" data-prev="section1"><i class="fa-solid fa-arrow-left"></i></button>
                        </div>
                    </div>
                </div>

                <!-- Section 3 -->
                <div class="form-section d-none" id="section3">
                    <div class="row m-0 justify-content-center" style="margin-top: 20px !important; margin-bottom:50px !important;">
                        <div class="col-md-10 col-10 d-flex justify-content-center" style="text-align:center !important;">
                            <span class="help_header_1">Please upload your image/screenshot<br>sending helps as proof for admin to verify.</span>
                        </div>
                    </div>
                    <div class="row m-0 justify-content-center">
                        <div class="col-md-6 col-6" style="border-radius:50px !important; background-color:#FDFCF7 !important; margin-bottom:60px !important; padding:50px 50px 50px 50px !important;">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-8 d-flex justify-content-center">
                                    <span class="help_form_type">Proof</span>
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin-top:50px !important; margin-bottom:50px !important;">
                                <div class="col-md-5 col-5 text-center">
                                    <button type="button" class="upload-proof-trigger" style="border-radius:40px !important; padding:30px 50px 30px 50px !important; font-weight:500 !important; background-color:#D9D9D9 !important">Upload file (JPG/JPEG/PNG)</button>
                                    <input type="file" id="proofImage" name="proof" class="form-control d-none" style="border-radius:15px !important;" accept="image/*" required>
                                    <div id="fileName_proof" class="text-center mt-2 d-none"></div> <!-- File name will appear here -->
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-12 d-flex justify-content-end">
                                    <button type="button" class="btn_grey_mini submit-btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 justify-content-center" style="margin-top: 20px !important; margin-bottom:50px !important;">
                        <div class="col-md-9 col-9">
                            <button type="button" class="btn_white_arrow prev-btn" data-prev="section2"><i class="fa-solid fa-arrow-left"></i></button>
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

        $(document).ready(function(){
            
            const sections = $('.form-section').length;

            $('.upload-proof-trigger').on('click', function () {
                $('#proofImage').trigger('click'); // Simulate a click on the file input
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

                                @if($help->category == 'financial')

                                    // Custom message using the input's validation message or a default message
                                    var errorMessage = `Please check amount "${fieldName}" maximum for financial support request by requester is RM `+{{ $help->quantity }}+`.`;

                                @else

                                    // Custom message using the input's validation message or a default message
                                    var errorMessage = `Please fill out the field "${fieldName}".`;

                                @endif

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

            $('.submit-btn').on('click', function () {
                const currentSection = $(this).closest('.form-section').attr('id');

                let isFormValid = true;

                // Validate the current section
                if (!validateCurrentSection(currentSection)) {
                    isFormValid = false;
                }

                if (isFormValid) {
                    // Submit the form explicitly
                    $('#sendHelpForm').submit();
                }
            });

        });
        
    </script>

</x-app-layout>
