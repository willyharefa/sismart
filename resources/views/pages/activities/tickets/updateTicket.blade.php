@extends('layouts.dashboard')

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@section('content')
    <div class="wrapper-container">
        {{-- Breadcrumb Navbar --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('ticket.index') }}">Tickets</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        {{-- End Breadcrumb Navbar --}}

        <legend class="mb-3">Update Ticket</legend>

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
                                    @foreach ($type_customers as $type_customer)
                                        <option value="{{ $type_customer->id }}" {{ $type_customer->id == $ticket->type_customer_id ? "selected" : '' }}>{{ $type_customer->name_type_customer }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm">
                                <select class="form-select" name="type_service" required>
                                    <option selected value="" disabled>Type Services</option>
                                    @foreach ($type_services as $type_service)
                                        <option value="{{ $type_service->id }}" {{ $type_service->id == $ticket->type_service_id ? "selected" : ""}}>{{ $type_service->name_service }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="sales_a" class="col-sm-2 col-form-label">Sales / Marketing</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="sales_pic_a" required
                                    placeholder="Sales A" value="{{ $ticket->sales_pic_a }}">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="sales_pic_b" required
                                    placeholder="Sales B (Optional)" value="{{ $ticket->sales_pic_b }}">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="sales_pic_c" required
                                    placeholder="Sales C (Optional)" value="{{ $ticket->sales_pic_c }}">
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Please fill a descripion of ticket activities" id="desc_ticket"
                                    style="height: 140px" name="desc_ticket" required>{{ $ticket->desc_ticket }}</textarea>
                                <label for="desc_ticket">Description Ticket</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to save this ?')">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

{{-- Select Search Plugin (Seacrch Customer) --}}
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
