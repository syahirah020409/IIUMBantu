<x-app-layout>
    <style>

    </style>

    <div class="row" style="background-color:#FDFCF7 !important;">
        <div class="col-md-12 col-12">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="row" style="background-color:#FDFCF7 !important;">
        <form action="{{ route('profile.new_profile_update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12 col-12">
                <div class="row justify-content-center" style="margin-top: 50px !important;">
                    <div class="col-md-10 col-10 d-flex justify-content-center">
                        @if($user->photo != NULL && $user->photo != '')
                            <img src="{{asset('user_profile_photo/'.$user->photo)}}" alt="" style="width:200px !important; height:200px !important; border:5px dashed #166269 !important; border-radius:50% !important;">
                        @else
                            <img src="{{asset('web_image/default.png')}}" alt="" style="width:200px !important; height:200px !important; border:5px dashed #166269 !important; border-radius:50% !important;">
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: -50px !important;">
                    <div class="col-auto">
                        <span class="user_profile_camera upload-trigger" style="cursor: pointer;"><i class="fa-solid fa-camera"></i></span>
                        <input type="file" id="profileImage" name="profile_photo" class="form-control d-none" style="border-radius:15px !important;" accept="image/*">
                        <div id="fileName" class="text-center mt-2 d-none"></div> <!-- File name will appear here -->
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 20px !important;">
                    <div class="col-md-6 col-6" style="border-radius:50px !important; background-color:#ECECEC !important; padding:50px !important;">
                        <div class="row justify-content-center" style="margin-bottom:20px !important;">
                            <div class="col-md-8 col-8">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label class="user_profile_label">FULL NAME</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <input type="text" name="name" value="{{ $user->name }}" class="user_profile_display" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin-bottom:20px !important;">
                            <div class="col-md-8 col-8">
                                <div class="row">
                                    <div class="col-md-12 col-12 d-flex justify-content-between align-items-center">
                                        <label class="user_profile_label">EMAIL</label><small class="text-danger">*email cannot be change / update</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <input type="email" name="email" value="{{ $user->email }}" class="user_profile_display" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin-bottom:20px !important;">
                            <div class="col-md-8 col-8">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label class="user_profile_label">PHONE NO.</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <input type="text" name="phone_number" value="{{ $user->phone_number ? $user->phone_number : '' }}" class="user_profile_display" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 50px !important;">
                    <div class="col-md-10 col-10 d-flex justify-content-center">
                        <button type="submit" class="btn-orange" style="border-radius:30px !important; font-size:18pt !important; font-weight:600 !important; margin-left:10px !important; margin-right:10px !important;">Save</button>
                        <a href="{{ route('profile.view') }}" class="btn-grey" style="border-radius:30px !important; font-size:18pt !important; font-weight:600 !important; margin-left:10px !important; margin-right:10px !important;">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="height:auto !important; background-color:#FDFCF7 !important; padding:20px 0px 100px 0px !important;">
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

        $(document).ready(function () {
            const sections = $('.form-section').length;

            $('.upload-trigger').on('click', function () {
                $('#profileImage').trigger('click'); // Simulate a click on the file input
            });

            $('#profileImage').on('change', function () {
                const fileName = $(this).val().split('\\').pop(); // Extract file name

                if (fileName) {
                    
                    // Show the file name below the icon
                    $('#fileName').removeClass('d-none').text(fileName);

                    $('#fileName').addClass('d-flex');

                } else {

                    $('#fileName').removeClass('d-flex');

                    $('#fileName').addClass('d-none');

                }
            });

        });
        
    </script>

</x-app-layout>
