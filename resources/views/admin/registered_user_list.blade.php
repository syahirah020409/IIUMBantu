<x-app-layout>
    <style>

        .nav-tabs{
            border-bottom:2px solid black !important;
            width:100% !important;
        }

        .nav-tabs .nav-link{
            font-size:16pt !important;
            border-top:2px solid black !important;
            border-left:2px solid black !important;
            border-right:2px solid black !important;
            border-bottom:1px solid black !important;
            background-color:#166269 !important;
            color:white !important;
            font-weight:500 !important;
        }

        .nav-tabs .nav-link.active{
            font-size:16pt !important;
            font-weight:bold !important;
            border-top:2px solid black !important;
            border-left:2px solid black !important;
            border-right:2px solid black !important;
            border-bottom:1px solid black !important;
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
            <span class="admin_request_title">User List</span>
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
                            List of Registered User
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Profile Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th class="text-center">Phone Number</th>
                                                <th class="text-center">Registered Date & Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($users) && count($users) > 0)
                                                @foreach($users as $user)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td class="d-flex justify-content-center">
                                                            @if($user->photo != NULL && $user->photo != '')
                                                                <img src="{{asset('user_profile_photo/'.$user->photo)}}" alt="" style="width:150px !important; height:150px !important; border:5px solid #166269 !important; border-radius:50% !important;">
                                                            @else
                                                                <img src="{{asset('web_image/default.png')}}" alt="" style="width:150px !important; height:150px !important; border:5px solid #166269 !important; border-radius:50% !important;">
                                                            @endif
                                                        </td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td class="text-center">{{ $user->phone_number ? $user->phone_number : 'Not Updated' }}</td>
                                                        <td class="text-center">
                                                            {{ $user->new_date_time }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" class="text-center">No Registered User Recorded.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @if(isset($users) && count($users) > 0)
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        {{ $users->links() }}
                                    </div>
                                </div>
                            @endif
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
