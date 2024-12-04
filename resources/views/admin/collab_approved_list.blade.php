
<div class="row">
    <div class="col-md-12 col-12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Requester</th>
                    <th class="text-center">Program Name</th>
                    <th class="text-center">Approved Date & Time</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($approved_donations) && count($approved_donations) > 0)
                    @foreach($approved_donations as $donate)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $donate->requester->name }}</td>
                            <td class="text-center">{{ $donate->name }}</td>
                            <td class="text-center">{{ $donate->new_date_time }}</td>
                            <td class="text-center">
                                <span class="badge bg-success">Approved</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.view_collab_details', $donate->id) }}" class="btn btn-dark">View</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">No Approved Collab Donations Recorded.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@if(isset($approved_donations) && count($approved_donations) > 0)
    <div class="row">
        <div class="col-md-12 col-12">
            {{ $approved_donations->links() }}
        </div>
    </div>
@endif