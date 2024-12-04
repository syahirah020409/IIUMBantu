
<div class="row">
    <div class="col-md-12 col-12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Request Number</th>
                    <th>Helper</th>
                    <th class="text-center">Method</th>
                    <th class="text-center">Verified Date & Time</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($verifieds) && count($verifieds) > 0)
                    @foreach($verifieds as $help)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $help->request->request_number ? $help->request->request_number : '-' }}</td>
                            <td>{{ $help->helper->name }}</td>
                            <td class="text-center">
                                @if($help->help_type == 'in_person')
                                    In-Person
                                @else
                                    Online Transfer
                                @endif
                            </td>
                            <td class="text-center">{{ $help->new_date_time }}</td>
                            <td class="text-center">
                                <span class="badge bg-success">Verified</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.view_request_details', $help->request_id) }}" class="btn btn-dark">View</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center">No Verified Offer Help Recorded.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@if(isset($verifieds) && count($verifieds) > 0)
    <div class="row">
        <div class="col-md-12 col-12">
            {{ $verifieds->links() }}
        </div>
    </div>
@endif