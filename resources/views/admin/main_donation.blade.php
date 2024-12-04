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

    <div class="row">
        <div class="col-md-12 col-12 background-col-admin-request">
            <span class="admin_request_title">Donation List</span>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="height:50px !important; background-color:#FDFCF7 !important;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12" style="height:auto !important; padding:50px 0px 50px 0px !important;">
            <div class="row m-0 justify-content-center">
                <div class="col-md-10 col-10" style="padding:50px !important; border-radius:50px !important; background-color:#166269 !important;">
                    <div class="card">
                        <div class="card-header" style="background-color:#FDFCF7 !important; font-size:16pt !important; font-weight:bold !important;">
                            List of Collaborating Donations
                        </div>
                        <div class="card-body">
                            <nav class="mb-3">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active flex-fill" id="nav-requesting-tab" data-bs-toggle="tab" data-bs-target="#nav-requesting" type="button" role="tab" aria-controls="nav-requesting" aria-selected="true">Requesting</button>
                                    <button class="nav-link flex-fill" id="nav-approved-tab" data-bs-toggle="tab" data-bs-target="#nav-approved" type="button" role="tab" aria-controls="nav-approved" aria-selected="false">Approved</button>
                                    <button class="nav-link flex-fill" id="nav-rejected-tab" data-bs-toggle="tab" data-bs-target="#nav-rejected" type="button" role="tab" aria-controls="nav-rejected" aria-selected="false">Rejected</button>
                                    <button class="nav-link flex-fill" id="nav-ended-tab" data-bs-toggle="tab" data-bs-target="#nav-ended" type="button" role="tab" aria-controls="nav-ended" aria-selected="false">Ended</button>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-requesting" role="tabpanel" aria-labelledby="nav-requesting-tab">
                                    @include('admin.collab_requesting_list')
                                </div>
                                <div class="tab-pane fade" id="nav-approved" role="tabpanel" aria-labelledby="nav-approved-tab">
                                    @include('admin.collab_approved_list')
                                </div>
                                <div class="tab-pane fade" id="nav-rejected" role="tabpanel" aria-labelledby="nav-rejected-tab">
                                    @include('admin.collab_rejected_list')
                                </div>
                                <div class="tab-pane fade" id="nav-ended" role="tabpanel" aria-labelledby="nav-ended-tab">
                                    @include('admin.collab_ended_list')
                                </div>
                            </div>
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
