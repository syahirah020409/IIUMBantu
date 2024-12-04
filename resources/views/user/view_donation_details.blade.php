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
                    <a href="{{ route('user.collaboration_form') }}" class="btn-grey" style="font-size:20pt !important; font-weight:600 !important;">Collab With Us</a>
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

    <div class="row">
        <div class="col-md-12 col-12" style="background-color:#FDFCF7 !important;">
            <div class="row justify-content-center m-0" style="margin-top:100px !important; margin-bottom:100px !important;">
                <div class="col-md-10 col-10 background-col-browse-2" style="border-radius:50px !important; padding-bottom:80px !important;">
                    <div class="row" style="margin-top:-70px !important;">
                        <div class="col-md-12 col-12 d-flex justify-content-center">
                            <span class="collab_detail_title">{{ $collab->name }}</span>
                        </div>
                    </div>
                    <div class="row justify-content-center" style="margin-top:50px !important;">
                        <div class="col-md-10 col-10 d-flex justify-content-center" style="text-align:center !important;">
                            <span class="collab_detail_description">{{ $collab->description }}</span>
                        </div>
                    </div>
                    <div class="row justify-content-center" style="margin-top:50px !important;">
                        <div class="col-md-5 col-5" style="padding-left:100px !important;">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <span class="collab_detail_target">Target<br>Donation<br>Amount:</span><br><br>
                                    <span class="collab_detail_amount">RM {{ number_format($collab->target_amount, 2) }}</span>
                                </div>
                            </div>
                            @if($collab->donation_for != NULL && !empty($collab->donation_for))
                                <div class="row" style="margin-top:50px !important;">
                                    <div class="col-md-12 col-12">
                                        <span class="collab_detail_for">This donation<br>is for:</span><br>
                                        <ol>
                                            @foreach($collab->new_donation_for as $index => $for)
                                                <li style="margin-top:10px !important; display:flex !important; align-items:center !important;"><span class="numbered-circle">{{ $index + 1 }}</span> <span class="collab_detail_list">{{ $for }}</span></li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-5 col-5 d-flex justify-content-center" style="text-align:center !important;">
                            <img src="{{asset('user_collab_donation_poster/'.$collab->poster)}}" alt="" style="width:100% !important; height:auto !important; border:5px solid #FDFCF7 !important;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center m-0" style="margin-top:100px !important; margin-bottom:100px !important;">
                <div class="col-md-10 col-10">
                    <a href="{{ route('user.donation') }}" class="btn-back-donate" style="font-size:24pt !important; font-weight:600 !important;">Back</a>
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
