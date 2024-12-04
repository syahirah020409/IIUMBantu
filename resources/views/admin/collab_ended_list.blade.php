
<div class="row">
    <div class="col-md-12 col-12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Requester</th>
                    <th class="text-center">Program Name</th>
                    <th class="text-center">Ended Date & Time</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($ended_donations) && count($ended_donations) > 0)
                    @foreach($ended_donations as $donate)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $donate->requester->name }}</td>
                            <td class="text-center">{{ $donate->name }}</td>
                            <td class="text-center">{{ $donate->new_date_time }}</td>
                            <td class="text-center">
                                <span class="badge bg-warning">Ended</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.view_collab_details', $donate->id) }}" class="btn btn-dark">View</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">No Ended Collab Donations Recorded.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@if(isset($ended_donations) && count($ended_donations) > 0)
    <div class="row">
        <div class="col-md-12 col-12">
            {{ $ended_donations->links() }}
        </div>
    </div>
@endif