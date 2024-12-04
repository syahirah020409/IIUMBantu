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

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="height:auto !important; background-color:#FDFCF7 !important; padding:20px 0px 100px 0px !important;">
            @if(isset($donations) && count($donations) > 0)
                @foreach($donations as $donate)
                    <div class="row m-0 justify-content-center" style="margin-top:80px !important;">
                        <div class="col-md-6 col-6 donation_detail"
                            style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('user_collab_donation_background/'.$donate->background) }}');
                            background-position: center;
                            background-repeat: no-repeat;
                            background-size: cover;">
                            <div class="row" style="margin-top:50px !important;">
                                <div class="col-md-12 col-12 d-flex justify-content-center">
                                    <span class="donation_detail_title">{{ $donate->name }}</span>
                                </div>
                            </div>
                            <div class="row" style="margin-top:30px !important;">
                                <div class="col-md-12 col-12 d-flex justify-content-center">
                                    <a href="{{ route('user.collab_donation_details', $donate->id) }}" class="btn-orange" style="font-size:12pt !important; font-weight:600 !important;">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row m-0 justify-content-center" style="margin-top:80px !important;">
                    <div class="col-md-6 col-6 donation_detail"
                        style="background-color:#4E4C4C !important;">
                        <div class="row" style="margin-top:80px !important;">
                            <div class="col-md-12 col-12 d-flex justify-content-center">
                                <span class="donation_detail_title">No Collab Donations Recorded.</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if($donations->total() > $donations->perPage())
                <div class="row m-0 justify-content-center" style="margin-top:80px !important;">
                    <div class="col-md-6 col-6" style="margin-top:30px !important; margin-bottom:30px !important; background-color:#C1C1C1 !important; padding:30px !important; border-radius:40px !important;">
                        {{ $donations->links() }}
                    </div>
                </div>
            @endif
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
