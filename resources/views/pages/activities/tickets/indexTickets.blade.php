@extends('layouts.dashboard')

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@section('content')
    <div class="wrapper-container">
        <legend class="mb-4">Tickets Page</legend>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="alert alert-primary text-black" role="alert">
            <h4 class="alert-heading mb-2">Information</h4>
            <p class="mb-0">Create your ticket to make activities, enjoy !</p>
        </div>

        <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Formulir Tickets
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('ticket.store') }}" method="POST" novalidate>
                        @csrf
                        @method('POST')
                        <div class="row g-2 mb-3">
                            <label for="single-select-field" class="col-sm-2 col-form-label">Company</label>
                            <div class="col-sm-5">
                                <select class="form-control" id="single-select-clear-field" name="konsumen_id"
                                    data-placeholder="Choose Customer" required>
                                    <option></option>
                                    @foreach ($konsumens as $konsumen)
                                        <option value="{{ $konsumen->id }}">{{ $konsumen->name_company }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="phone_number" required
                                    placeholder="Phone Number">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="name_pic" required placeholder="Name PIC">
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="type_customer_id" class="col-sm-2 col-form-label">Type Customer</label>
                            <div class="col-sm-4">
                                <select class="form-select" id="type_customer_id" name="type_customer_id" required>
                                    <option selected value="" disabled>Category Customer</option>
                                    @foreach ($type_customers as $type_customer)
                                        <option value="{{ $type_customer->id }}">{{ $type_customer->name_type_customer }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm">
                                <select class="form-select" name="type_service_id" required>
                                    <option selected value="" disabled>Type Services</option>
                                    @foreach ($type_services as $type_service)
                                        <option value="{{ $type_service->id }}">{{ $type_service->name_service }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="sales_a" class="col-sm-2 col-form-label">Sales / Marketing</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="sales_pic_a" required
                                    placeholder="Sales A">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="sales_pic_b" required
                                    placeholder="Sales B (Optional)">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="sales_pic_c" required
                                    placeholder="Sales C (Optional)">
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Please fill a descripion of ticket activities" id="desc_ticket"
                                    style="height: 140px" name="desc_ticket" required></textarea>
                                <label for="desc_ticket">Description Ticket</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Ticket</button>
                    </form>
                </div>
            </div>
        </div>


        {{-- Table Tickets --}}
        <div class="table-responsive mt-5">
            <div class="table">
                <table id="example" class="table table-striped nowrap table-sm" width="100%">
                    <thead>
                        <tr>
                            <th data-priority="1">#</th>
                            <th data-priority="2">Ticket</th>
                            <th data-priority="3">Company</th>
                            <th>Type Bussiness</th>
                            <th>Type Services</th>
                            <th>Sales</th>
                            <th data-priority="5">Status</th>
                            <th data-priority="6">Progress</th>
                            <th data-priority="4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $key => $ticket)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ticket->cd_ticket }}</td>
                                <td>{{ $ticket->konsumens->name_company }}</td>
                                <td>{{ $ticket->type_customer->name_type_customer }}</td>
                                <td>{{ $ticket->type_service->name_service }}</td>
                                <td>{{ $ticket->sales_pic_a }}</td>
                                <td>{{ $ticket->status }}</td>
                                <td>{{ $ticket->prospects == null ? 'Draf' : $ticket->prospects->type_action->name_action }}</td>
                                <td>
                                    @if ($ticket->status == 'Draf')
                                        <!-- Modal Start Prospect-->
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalStartProspect_{{ $ticket->id }}">
                                            <i class='bx bx-play-circle'></i>
                                            Start Prospect
                                        </button>

                                        <!-- Modal Start Prospect -->
                                        <div class="modal fade" id="modalStartProspect_{{ $ticket->id }}"
                                            tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5">Formulir Prospect
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('prospect.store') }}" method="POST"
                                                            class="needs-validation" novalidate>
                                                            @csrf
                                                            @method('POST')
                                                            <div class="row g-3 mb-3">
                                                                <label class="col-sm-3 col-form-label">Status
                                                                    Ticket</label>
                                                                <div class="col">
                                                                    <input type="text" readonly class="form-control"
                                                                        title="Code Ticket"
                                                                        value="{{ $ticket->cd_ticket }}">
                                                                    <input type="hidden" value="{{ $ticket->id }}"
                                                                        name="ticket_id">
                                                                </div>
                                                                <div class="col">
                                                                    <select class="form-select" required
                                                                        name="type_action_id">
                                                                        <option selected value="">Type Progress
                                                                        </option>
                                                                        @foreach ($typeActions as $typeAction)
                                                                            <option value="{{ $typeAction->id }}">{{ $typeAction->name_action }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col">
                                                                    <input type="date" class="form-control"
                                                                        name="date_progress" required>
                                                                </div>
                                                            </div>
                                                            <div class="row g-3 mb-3">
                                                                <label for="issue"
                                                                    class="col-sm-3 col-form-label">Issue</label>
                                                                <div class="col">
                                                                    <textarea class="form-control" name="issue" id="issue" rows="4" name="issue" required
                                                                        placeholder="Strip (-) if not have a issue"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row g-3 mb-3">
                                                                <label for="desc_action"
                                                                    class="col-sm-3 col-form-label">Action</label>
                                                                <div class="col">
                                                                    <textarea class="form-control" name="desc_action" id="desc_action" rows="4" name="desc_action" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row g-3 mb-3">
                                                                <label for="remarks"
                                                                    class="col-sm-3 col-form-label">Remarks</label>
                                                                <div class="col">
                                                                    <input class="form-control" type="text"
                                                                        name="remarks" id="remarks" required>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <button type="submit" class="btn btn-primary">Create
                                                                    Progress</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <a type="button" class="btn btn-info btn-sm"
                                            href="{{ route('prospect.show', $ticket->prospects->id) }}">
                                            <i class='bx bxs-chevrons-up bx-flashing'></i>
                                            Update Progress
                                        </a>
                                    @endif
                                    <a class="btn btn-warning btn-sm" href="{{ route('ticket.show', $ticket->id) }}">Edit</a>
                                    <form action="" method="POST" class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger d-inline-block"
                                            onclick="return confirm('Are you sure ?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- End Table Tickets --}}


    </div>
@endsection

@push('custom-script')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#single-select-clear-field').select2({
            theme: "bootstrap-5",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        }).css('font-family', 'Public Sans');
    </script>
@endpush
