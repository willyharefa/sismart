@extends('layouts.dashboard')
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

        <div class="alert alert-secondary text-black" role="alert">
            <h4 class="alert-heading">Information</h4>
            <p>Create your ticket to make activities, enjoy !</p>
        </div>

        {{-- <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Formulir Tickets
                </div>
                <div class="card-body">
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-4">
                            <label for="name_company" class="form-label">Company</label>
                            <input type="text" class="form-control" id="name_company" name="name_company" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">P I C</label>
                            <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Username</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" class="form-control" id="validationCustomUsername"
                                    aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">City</label>
                            <input type="text" class="form-control" id="validationCustom03" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">State</label>
                            <select class="form-select" id="validationCustom04" required>
                                <option selected disabled value="">Choose...</option>
                                <option>...</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="validationCustom05" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Create Ticket</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

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
                            <label for="company" class="col-sm-2 col-form-label">Company</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="company" name="name_company" required
                                    placeholder="Company">
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
                            <label for="type_customer" class="col-sm-2 col-form-label">Type Customer</label>
                            <div class="col-sm-4">
                                <select class="form-select" id="type_customer" name="category_customer" required>
                                    <option selected value="" disabled>Category Customer</option>
                                    <option value="PDAM/UPTD">PDAM/UPTD</option>
                                    <option value="Hotel">Hotel</option>
                                    <option value="PKS/Industry">PKS/Industry</option>
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
    </div>
@endsection
