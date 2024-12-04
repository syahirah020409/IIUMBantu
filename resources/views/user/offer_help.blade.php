<x-app-layout>
    <style>

        ul {
            list-style-type: disc !important; /* Default bullet style */
            padding-left: 20px;    /* Ensure there's space for the bullets */
        }

    </style>

    <div class="row">
        <div class="col-md-12 col-12">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12" style="height:320px !important;">
            <div class="row justify-content-center" style="margin-top: 100px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <span class="help_header">Send Help</span>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 20px !important;">
                <div class="col-md-10 col-10 d-flex justify-content-center">
                    <span class="help_header_1">Please select your preferred method.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="height:auto !important;">
            <div class="row m-0 justify-content-center">
                <div class="col-md-10 col-10" style="border-radius:50px !important; background-color:#FDFCF7 !important; padding:50px 100px 70px 100px !important; margin-bottom:100px !important;">
                    <div class="row justify-content-center" style="margin-top:20px !important;">
                        <div class="col-md-8 col-8 d-flex justify-content-between">
                            <a href="{{ route('user.offer_help_type', ['type'=>'in_person', 'id'=>$help->id]) }}" class="btn_help_orange">In-Person</a>
                            <a href="{{ route('user.offer_help_type', ['type'=>'online_transfer', 'id'=>$help->id]) }}" class="btn_help_orange">Online Transfer</a>
                        </div>
                    </div>
                    <div class="row justify-content-center" style="margin-top:50px !important; margin-bottom:50px !important;">
                        <div class="col-md-10 col-10" style="background-color:#D9D9D9 !important; border-radius:50px !important; padding:60px !important;">
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-6" style="background-color:white !important; border-radius:50px !important; padding:50px !important;">
                                    <div class="row mb-3 mx-0 justify-content-center">
                                        <div class="col-md-10 d-flex align-items-center justify-content-center">
                                            <span style="font-weight:bold !important; font-size:16pt !important;">{{ $help->request_number }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mx-0 justify-content-center">
                                        <div class="col-md-10 d-flex align-items-center justify-content-center map_modal_category">
                                            <span id="modal_category">
                                                @if($help->category == 'food')
                                                    Food
                                                @elseif($help->category == 'medical')
                                                    Medical Aid
                                                @elseif($help->category == 'academic')
                                                    Academic Resources
                                                @else
                                                    Financial Support
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mx-0 justify-content-center">
                                        <div class="col-md-10 d-flex align-items-center justify-content-center map_modal_detail">
                                            <span id="modal_detail">{{ $help->details }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mx-0 justify-content-center">
                                        <div class="col-md-10 d-flex align-items-center justify-content-center map_modal_detail">
                                            <span id="modal_quantity">
                                                @if($help->category == 'financial')
                                                    RM {{ $help->quantity }}
                                                @else
                                                    {{ $help->quantity }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mx-0 justify-content-center">
                                        <div class="col-md-10 d-flex align-items-center justify-content-center map_modal_detail">
                                            <span id="modal_urgent">
                                                @if($help->urgent == 'yes')
                                                    Urgent
                                                @else
                                                    Not Urgent
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mx-0 justify-content-center">
                                        <div class="col-md-10 d-flex align-items-center justify-content-center map_modal_address">
                                            <i class="fa-solid fa-location-dot" style="color:#E06464 !important;"></i>&nbsp;<span id="modal_address">{{ $help->full_address }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <a href="{{ route('user.map') }}" class="btn_grey_mini" style="font-size:20pt !important; font-weight:600 !important; width:150px !important;">Back</a>
                        </div>
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

    
    <script>
        
    </script>

</x-app-layout>
