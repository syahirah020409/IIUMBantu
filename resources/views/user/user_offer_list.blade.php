
<div class="row">
    <div class="col-md-12 col-12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Request Number</th>
                    <th class="text-center">Method</th>
                    <th class="text-center">Updated Date & Time</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($offers) && count($offers) > 0)
                    @foreach($offers as $help)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $help->request->request_number ? $help->request->request_number : '-' }}</td>
                            <td class="text-center">
                                @if($help->help_type == 'in_person')
                                    In-Person
                                @else
                                    Online Transfer
                                @endif
                            </td>
                            <td class="text-center">{{ $help->new_date_time }}</td>
                            <td class="text-center">
                                @if($help->status == 0)
                                    <span class="badge bg-warning">Unverified</span>
                                @else
                                    <span class="badge bg-success">Verified</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">No Offer Help Recorded.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@if(isset($offers) && count($offers) > 0)
    <div class="row">
        <div class="col-md-12 col-12">
            {{ $offers->links() }}
        </div>
    </div>
@endif