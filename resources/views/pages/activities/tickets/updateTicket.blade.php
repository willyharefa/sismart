@extends('layouts.dashboard')

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@section('content')
    <div class="wrapper-container">
        <legend class="m-3">Ticket Page</legend>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert --}}

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
                                        <option value="{{ $konsumen->id }}" {{ $ticket->konsumen_id == $konsumen->id ? 'selected' : '' }}>{{ $konsumen->name_company }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="phone_number" required
                                    placeholder="Phone Number" value="{{ $ticket->phone_number }}" title="Phone Number">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="name_pic" required placeholder="Name PIC" value="{{ $ticket->name_pic }}">
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="type_customer" class="col-sm-2 col-form-label">Type Customer</label>
                            <div class="col-sm-4">
                                <select class="form-select" id="type_customer" name="category_customer" required>
                                    <option selected value="" disabled>Category Customer</option>
                                    <option value="PDAM/UPTD" {{ $ticket->category_customer == "PDAM/UPTD" ? "selected" : "" }} >PDAM/UPTD</option>
                                    <option value="Hotel" {{ $ticket->category_customer == "Hotel" ? "selected" : "" }} >Hotel</option>
                                    <option value="PKS/Industry" {{ $ticket->category_customer == "PKS/Industry" ? "selected" : "" }} >PKS/Industry</option>
                                </select>
                            </div>
                            <div class="col-sm">
                                <select class="form-select" name="type_service" required>
                                    <option selected value="" disabled>Type Services</option>
                                    <option value="General Chemical">General Chemical</option>
                                    <option value="Boiler Chemical">Boiler Chemical</option>
                                    <option value="Specialty Chemical">Specialty Chemical</option>
                                    <option value="General Chemical & Boiler Chemical">General Chemical & Boiler Chemical
                                    </option>
                                    <option value="General Chemical & Specialty Chemical">General Chemical & Specialty
                                        Chemical</option>
                                    <option value="Specialty Chemical & Boiler Chemical">Specialty Chemical & Boiler
                                        Chemical</option>
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

        <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Data Ticket
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('ticket.update', $ticket->id) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row g-2 mb-3">
                            <label for="name_action" class="col-sm-2 col-form-label">Name Action</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name_action" name="name_action" placeholder="Name of action" required>
                            </div>
                            <div class="col-sm">
                                <select class="form-select" name="status_action" required>
                                    <option selected value="">Choose Categories...</option>
                                    <option value="Prospect">Prospect</option>
                                    <option value="Hot Prospect">Hot Prospect</option>
                                  </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="detail_action" class="col-sm-2 col-form-label">Description</label>
                            <div class="col">
                                <textarea class="form-control" placeholder="Type detail of action..." name="detail_action" id="detail_action" rows="3" required></textarea>
                            </div>
                        </div>
                        <a href="{{ route('ticket.index') }}" class="btn btn-secondary">Back To Tickets</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('custom-script')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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