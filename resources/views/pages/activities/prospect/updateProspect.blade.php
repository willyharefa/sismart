@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend class="mb-4">Update Progress</legend>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Card Progress
                </div>
                <div class="card-body">
                    <div class="row g-2 mb-3">
                        <label for="company" class="col-sm-2 col-form-label">Company</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" readonly id="company" placeholder="Company" value="{{ $ticket->konsumens->name_company }}">
                        </div>
                        <div class="col-sm">
                            <input type="text" class="form-control" readonly value="{{ $ticket->phone_number }}">
                        </div>
                        <div class="col-sm">
                            <input type="text" class="form-control" readonly value="{{ $ticket->name_pic }}">
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <label for="type_customer" class="col-sm-2 col-form-label">Services Plan</label>
                        <div class="col-sm">
                            <input type="date" class="form-control" readonly value="{{ $prospect->date_progress }}" title="Current Date plan action">
                        </div>
                        <div class="col-sm">
                            <input type="text" class="form-control" readonly value="{{ $ticket->type_service->name_service }}" title="Services plan to customer">
                        </div>
                        <div class="col-sm">
                            @if ($prospect->type_action_id == null)
                                <input type="text" class="form-control" readonly value="Unavailable" title="Current Progress">
                            @else
                                <input type="text" class="form-control" readonly value="{{ $prospect->type_action->name_action }}" title="Current Progress">
                            @endif
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <label for="type_customer" class="col-sm-2 col-form-label">Details Previous</label>
                        <div class="col-sm">
                            <div class="form-floating mb-2">
                                <input type="text" readonly class="form-control-plaintext"  value="{{ $prospect->issue }}">
                                <label>Issue</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" readonly class="form-control-plaintext"  value="{{ $prospect->desc_action }}">
                                <label>Description Action</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" readonly class="form-control-plaintext"  value="{{ $prospect->remarks }}">
                                <label>Remark of action</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    New Progress
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('prospect.update', $prospect->id) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row g-2 mb-3">
                            <label for="date_progress" class="col-sm-2 col-form-label">Date Action</label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="date_progress" name="date_progress" required title="Date action">
                                <input type="hidden" value="{{ $ticket->id }}" name="ticket_id">
                            </div>
                            <div class="col-sm">
                                <select class="form-select" required name="type_action_id" id="actionProgress">
                                    <option selected value="">Choose Progress</option>
                                    @foreach ($typeActions as $typeAction)
                                        @if ($prospect->type_action_id !== $typeAction->id)
                                        <option value="{{ $typeAction->id }}">{{ $typeAction->name_action }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="remarks" required
                                    placeholder="Please fill this remarks action...">
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Please fill this issue" id="issue"
                                    style="height: 140px" name="issue" required></textarea>
                                <label for="issue">Issue</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Please fill this description action" id="desc_action"
                                    style="height: 140px" name="desc_action" required></textarea>
                                <label for="desc_action">Action</label>
                            </div>
                        </div>
                        <div class="d-flex g-2 mb-2">
                            <a class="btn btn-secondary" type="button" href="{{ route('ticket.index') }}">Back To Tickets</a>
                            <button type="submit" class="btn btn-info ms-auto" onclick="return confirm('Are you sure ?')">Continue Action</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-script')
    <script></script>
@endpush
