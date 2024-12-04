<x-app-layout>
    <style>

        .nav-tabs{
            border-bottom:none !important;
            width:100% !important;
        }

        .nav-tabs .nav-link{
            font-size:16pt !important;
            background-color:#166269 !important;
            color:white !important;
            font-weight:500 !important;
            margin-left:10px !important;
            margin-right:10px !important;
            border-radius:10px !important;
        }

        .nav-tabs .nav-link.active{
            font-size:16pt !important;
            font-weight:bold !important;
            background-color:#D5993F !important;
            color:white !important;
        }

    </style>

    <div class="row" style="background-color:#FDFCF7 !important;">
        <div class="col-md-12 col-12">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="row" style="background-color:#FDFCF7 !important;">
        <div class="col-md-12 col-12" style="height:auto !important; padding:50px 0px 50px 0px !important;">
            <div class="row m-0 justify-content-center">
                <div class="col-md-10 col-10" style="padding:50px !important; border-radius:50px !important; background-color:#166269 !important;">
                    <div class="card">
                        <div class="card-header" style="background-color:#FDFCF7 !important; font-size:16pt !important; font-weight:bold !important;">
                            Request / Offer / Collab Donations Listing.
                        </div>
                        <div class="card-body">
                            <nav class="mb-3">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active flex-fill" id="nav-request-tab" data-bs-toggle="tab" data-bs-target="#nav-request" type="button" role="tab" aria-controls="nav-request" aria-selected="true">Request Help</button>
                                    <button class="nav-link flex-fill" id="nav-offer-tab" data-bs-toggle="tab" data-bs-target="#nav-offer" type="button" role="tab" aria-controls="nav-offer" aria-selected="false">Offer Help</button>
                                    <button class="nav-link flex-fill" id="nav-collab-tab" data-bs-toggle="tab" data-bs-target="#nav-collab" type="button" role="tab" aria-controls="nav-collab" aria-selected="false">Collab Donation</button>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab">
                                    @include('user.user_request_list')
                                </div>
                                <div class="tab-pane fade" id="nav-offer" role="tabpanel" aria-labelledby="nav-offer-tab">
                                    @include('user.user_offer_list')
                                </div>
                                <div class="tab-pane fade" id="nav-collab" role="tabpanel" aria-labelledby="nav-collab-tab">
                                    @include('user.user_collab_list')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        
    </script>

</x-app-layout>
