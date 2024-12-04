
<div class="row">
    <div class="col-md-12 col-12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Requester</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Rejected Date & Time</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($rejected_helps) && count($rejected_helps) > 0)
                    @foreach($rejected_helps as $help)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $help->requester->name }}</td>
                            <td class="text-center">{{ $help->category }}</td>
                            <td class="text-center">{{ $help->new_date_time }}</td>
                            <td class="text-center">
                                <span class="badge bg-danger">Rejected</span>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#viewReason_{{ $help->id }}">View Reason</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">No Rejected Request Help Recorded.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@if(isset($rejected_helps) && count($rejected_helps) > 0)
    <div class="row">
        <div class="col-md-12 col-12">
            {{ $rejected_helps->links() }}
        </div>
    </div>
@endif

@if(isset($rejected_helps) && count($rejected_helps) > 0)
    @foreach($rejected_helps as $help)
        <!-- Modal -->
        <div class="modal fade" id="viewReason_{{ $help->id }}" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="staticBackdropLabel">View Reason</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="font-size:13pt !important;">
                        <div class="row mb-3 mx-0">
                            <div class="col-md-12 text-center">
                                <span style="font-size:16pt !important; font-weight:600 !important;">{{ $help->requester->name }}</span>
                            </div>
                        </div>
                        <div class="row mb-3 mx-0">
                            <div class="col-md-12 text-center">
                                <textarea name="reason" class="form-control" id="reason" rows="4" placeholder="Please state your reason for rejecting this request.." style="border-radius:20px !important;" readonly disabled>{{ $help->reason }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif