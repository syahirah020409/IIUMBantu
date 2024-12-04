
<div class="row">
    <div class="col-md-12 col-12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Program Name</th>
                    <th class="text-center">Updated Date & Time</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($collabs) && count($collabs) > 0)
                    @foreach($collabs as $donate)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $donate->name }}</td>
                            <td class="text-center">{{ $donate->new_date_time }}</td>
                            <td class="text-center">
                                @if($donate->status == 0)
                                    <span class="badge bg-info">Requesting</span>
                                @elseif($donate->status == 1)
                                    <span class="badge bg-success">Approved</span>
                                @elseif($donate->status == 2)
                                    <span class="badge bg-danger">Rejected</span>
                                @else
                                    <span class="badge bg-warning">Ended</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($donate->status == 2)
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#viewReason_{{ $donate->id }}">View Reason</button>
                                @else
                                    No Action
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">No Collab Donations Recorded.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@if(isset($collabs) && count($collabs) > 0)
    <div class="row">
        <div class="col-md-12 col-12">
            {{ $collabs->links() }}
        </div>
    </div>
@endif


@if(isset($collabs) && count($collabs) > 0)
    @foreach($collabs as $donate)
        <!-- Modal -->
        <div class="modal fade" id="viewReason_{{ $donate->id }}" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="staticBackdropLabel">View Reason</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="font-size:13pt !important;">
                        <div class="row mb-3 mx-0">
                            <div class="col-md-12 text-center">
                                <textarea name="reason" class="form-control" id="reason" rows="4" placeholder="Please state your reason for rejecting this request.." style="border-radius:20px !important;" readonly disabled>{{ $donate->reason }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
