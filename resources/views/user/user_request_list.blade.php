
<div class="row">
    <div class="col-md-12 col-12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Request Number</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Updated Date & Time</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($requests) && count($requests) > 0)
                    @foreach($requests as $help)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $help->request_number ? $help->request_number : '-' }}</td>
                            <td class="text-center">{{ $help->category }}</td>
                            <td class="text-center">{{ $help->new_date_time }}</td>
                            <td class="text-center">
                                @if($help->status == 0)
                                    <span class="badge bg-info">Requesting</span>
                                @elseif($help->status == 1)
                                    <span class="badge bg-success">Approved</span>
                                @elseif($help->status == 2)
                                    <span class="badge bg-danger">Rejected</span>
                                @else
                                    <span class="badge bg-warning">Helped</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($help->status == 0)
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#cancelRequest_{{ $help->id }}">Cancel</button>
                                @elseif($help->status == 2)
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#viewReason_{{ $help->id }}">View Reason</button>
                                @else
                                    No Action
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">No Request Help Recorded.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@if(isset($requests) && count($requests) > 0)
    <div class="row">
        <div class="col-md-12 col-12">
            {{ $requests->links() }}
        </div>
    </div>
@endif

@if(isset($requests) && count($requests) > 0)
    @foreach($requests as $help)
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
                                <textarea name="reason" class="form-control" id="reason" rows="4" placeholder="Please state your reason for rejecting this request.." style="border-radius:20px !important;" readonly disabled>{{ $help->reason }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="cancelRequest_{{ $help->id }}" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="staticBackdropLabel">Canceling Request Help</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="font-size:13pt !important;">
                        <form action="{{ route('user.cancel_request_help') }}" method="POST">
                            @csrf
                            <div class="row mb-3 mx-0">
                                <div class="col-md-12 text-center">
                                    <span style="font-size:16pt !important; font-weight:600 !important;">Are you sure want to cancel?</span>
                                    <input type="text" name="request_id" value="{{ $help->id }}" hidden>
                                </div>
                            </div>
                            <div class="row mb-3 mx-0">
                                <div class="col-md-12 col-12 text-center">
                                    <button type="submit" class="btn btn-success">Yes</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif


