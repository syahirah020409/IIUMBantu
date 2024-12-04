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
        <div class="col-md-12 col-12 background-col-browse">
            <span class="browse_header">Browse Request</span>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12 p-0" style="height:50px !important; background-color:#FDFCF7 !important;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12 background-col-browse-2">
            <div class="row justify-content-end m-0" style="margin-top:20px !important;">
                <div class="col-auto" style="border-top-left-radius:25px !important; border-bottom-left-radius:25px !important; padding:20px 30px 20px 30px !important; background-color:#FDFCF7 !important;">
                    <span class="browse_1"><i class="fa-solid fa-circle" style="color:#D5993F !important;"></i>&emsp;High Urgency</span><br>
                    <span class="browse_1"><i class="fa-solid fa-circle" style="color:#166269 !important;"></i>&emsp;Low Urgency</span>
                </div>
            </div>
            <div class="row justify-content-center m-0" style="margin-top:30px !important;">
                <div class="col-md-8 col-8">
                    @if(isset($request_helps) && count($request_helps) > 0)
                        @if(count($request_helps) == 1)
                            <div class="row justify-content-center">
                                @foreach($request_helps as $help)
                                    <div class="col-md-5 col-5" style="margin-top:30px !important; margin-bottom:30px !important;">
                                        <div class="card shadow" style="background-color:#FDFCF7 !important; padding:30px !important; border-radius:30px !important; min-height:400px !important;">
                                            <div class="card-body" style="position: relative;">
                                                <div class="row">
                                                    <div class="col-md-7 col-7 d-flex align-items-center">
                                                        <div class="row">
                                                            <div class="col-md-2 col-2 d-flex align-items-center">
                                                                <i class="fa-solid fa-circle" style="color:#D5993F !important; font-size:16pt !important;"></i>
                                                            </div>
                                                            <div class="col-md-10 col-10">
                                                                @if($help->category == 'food')
                                                                    <span class="browse_card_title">Food</span>
                                                                @elseif($help->category == 'medical')
                                                                    <span class="browse_card_title">Medical Aid</span>
                                                                @elseif($help->category == 'academic')
                                                                    <span class="browse_card_title">Academic Resources</span>
                                                                @else
                                                                    <span class="browse_card_title">Financial Support</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 col-5 text-end">
                                                        <span class="browse_card_number" style="color:#D5993F !important;">{{ $help->request_number }}</span><br>
                                                        <span class="browse_card_time">posted {{ $help->posted_time }}</span>
                                                    </div>
                                                </div>
                                                <hr style="border-top-width:3px !important; margin-top:15px !important; margin-bottom:15px !important;">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <ul>
                                                            <li><span class="browse_card_detail_1" style="font-size:18pt !important;">Details : </span><span class="browse_card_detail_1" style="font-size:18pt !important;">{{ $help->details }}</span></li>
                                                            <li><span class="browse_card_detail_1">Quantity : </span><span class="browse_card_detail_2">{{ $help->quantity }}</span></li>
                                                            <li><span class="browse_card_detail_1">Location : </span><span class="browse_card_detail_2">{{ $help->full_address }}</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center" style="position: absolute; bottom: 0; width: 100%;">
                                                    <div class="col-auto">
                                                        <a href="{{ route('user.offer_help', $help->id) }}" class="btn-grey" style="font-size:16pt !important;">Send Help</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="row justify-content-between">
                                @foreach($request_helps as $help)
                                    <div class="col-md-5 col-5" style="margin-top:30px !important; margin-bottom:30px !important;">
                                        <div class="card shadow" style="background-color:#FDFCF7 !important; padding:30px !important; border-radius:30px !important; min-height:400px !important;">
                                            <div class="card-body" style="position: relative;">
                                                <div class="row">
                                                    <div class="col-md-7 col-7 d-flex align-items-center">
                                                        <div class="row">
                                                            <div class="col-md-2 col-2 d-flex align-items-center">
                                                                <i class="fa-solid fa-circle" style="color:#D5993F !important; font-size:16pt !important;"></i>
                                                            </div>
                                                            <div class="col-md-10 col-10">
                                                                @if($help->category == 'food')
                                                                    <span class="browse_card_title">Food</span>
                                                                @elseif($help->category == 'medical')
                                                                    <span class="browse_card_title">Medical Aid</span>
                                                                @elseif($help->category == 'academic')
                                                                    <span class="browse_card_title">Academic Resources</span>
                                                                @else
                                                                    <span class="browse_card_title">Financial Support</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 col-5 text-end">
                                                        <span class="browse_card_number" style="color:#D5993F !important;">{{ $help->request_number }}</span><br>
                                                        <span class="browse_card_time">posted {{ $help->posted_time }}</span>
                                                    </div>
                                                </div>
                                                <hr style="border-top-width:3px !important; margin-top:15px !important; margin-bottom:15px !important;">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <ul>
                                                            <li><span class="browse_card_detail_1" style="font-size:18pt !important;">Details : </span><span class="browse_card_detail_1" style="font-size:18pt !important;">{{ $help->details }}</span></li>
                                                            <li><span class="browse_card_detail_1">Quantity : </span><span class="browse_card_detail_2">{{ $help->quantity }}</span></li>
                                                            <li><span class="browse_card_detail_1">Location : </span><span class="browse_card_detail_2">{{ $help->full_address }}</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center" style="position: absolute; bottom: 0; width: 100%;">
                                                    <div class="col-auto">
                                                        <a href="{{ route('user.offer_help', $help->id) }}" class="btn-grey" style="font-size:16pt !important;">Send Help</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if($request_helps->total() > $request_helps->perPage())
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-10" style="margin-top:30px !important; margin-bottom:30px !important; background-color:#FDFCF7 !important; padding:30px !important; border-radius:30px !important;">
                                    {{ $request_helps->links() }}
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-6" style="margin-top:30px !important; margin-bottom:30px !important;">
                                <div class="card shadow" style="background-color:#FDFCF7 !important; padding:30px !important; border-radius:30px !important; min-height:100px !important;">
                                    <div class="card-body" style="position: relative;">
                                        <div class="row">
                                            <div class="col-md-12 col-12 d-flex align-items-center justify-content-center">
                                                <span class="browse_card_title">No Approved Request Recorded.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
