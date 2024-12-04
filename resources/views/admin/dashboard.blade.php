<x-app-layout>
    <style>

    </style>

    <div class="row" style="background-color:#FDFCF7 !important;">
        <div class="col-md-12 col-12">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12 background-col-admin-request">
            <span class="admin_request_title">Admin Dashboard</span>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="height:50px !important; background-color:#FDFCF7 !important;">
        </div>
    </div>

    <div class="row justify-content-center" style="background-color:#FDFCF7 !important;">
        <div class="col-md-8 col-8">
            <div class="row justify-content-between">
                <div class="col-md-5 admin_dashboard_card">
                    <div class="row">
                        <div class="col-md-9 col-9">
                            <span class="dashboard_card_title">Total Request<br>Helps</span>
                        </div>
                        <div class="col-md-3 col-3 d-flex align-items-center justify-content-center">
                            <span class="dashboard_card_number">{{ $request_count }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 admin_dashboard_card">
                    <div class="row">
                        <div class="col-md-9 col-9">
                            <span class="dashboard_card_title">Total Offer<br>Helps</span>
                        </div>
                        <div class="col-md-3 col-3 d-flex align-items-center justify-content-center">
                            <span class="dashboard_card_number">{{ $offer_count }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 admin_dashboard_card">
                    <div class="row">
                        <div class="col-md-9 col-9">
                            <span class="dashboard_card_title">Total Collab<br>Donations</span>
                        </div>
                        <div class="col-md-3 col-3 d-flex align-items-center justify-content-center">
                            <span class="dashboard_card_number">{{ $collab_count }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 admin_dashboard_card">
                    <div class="row">
                        <div class="col-md-9 col-9">
                            <span class="dashboard_card_title">Total Registered<br>Users</span>
                        </div>
                        <div class="col-md-3 col-3 d-flex align-items-center justify-content-center">
                            <span class="dashboard_card_number">{{ $user_count }}</span>
                        </div>
                    </div>
                </div>
            </div>
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

    
    <script>
        
    </script>

</x-app-layout>
