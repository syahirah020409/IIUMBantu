
<div class="row">
    <div class="col-md-12 col-12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Request Number</th>
                    <th>Requester</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Approved Date & Time</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($approved_helps) && count($approved_helps) > 0)
                    @foreach($approved_helps as $help)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $help->request_number ? $help->request_number : '-' }}</td>
                            <td>{{ $help->requester->name }}</td>
                            <td class="text-center">{{ $help->category }}</td>
                            <td class="text-center">{{ $help->new_date_time }}</td>
                            <td class="text-center">
                                <span class="badge bg-success">Approved</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.view_request_details', $help->id) }}" class="btn btn-dark">View</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center">No Approved Request Help Recorded.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@if(isset($approved_helps) && count($approved_helps) > 0)
    <div class="row">
        <div class="col-md-12 col-12">
            {{ $approved_helps->links() }}
        </div>
    </div>
@endif