@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        {{-- Breadcrumb Navbar --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('konsumens.index') }}">Customers</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        {{-- End Breadcrumb Navbar --}}

        {{-- Card Edit --}}
        <div class="card mt-4">
            <div class="card-header">
                Biodata Card
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" action="{{ route('konsumens.update', $konsumen->id) }}" method="POST" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-6">
                        <label for="name_company" class="form-label">Name Company</label>
                        <input type="text" class="form-control" id="name_company" value="{{ $konsumen->name_company }}" name="name_company" required>
                    </div>
                    <div class="col-md-3">
                        <label for="type_company" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type_company" value="{{ $konsumen->type_company }}" name="type_company" required>
                    </div>
                    <div class="col-md-3">
                        <label for="npwp" class="form-label">NPWP</label>
                        <input type="text" class="form-control" id="npwp" value="{{ $konsumen->npwp }}" name="npwp" required>
                    </div>
                    <div class="col-md-3">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" value="{{ $konsumen->contact_number }}" name="contact_number" required>
                    </div>
                    <div class="col-md-4">
                        <label for="contact_manager" class="form-label">PIC</label>
                        <input type="text" class="form-control" id="contact_manager" value="{{ $konsumen->contact_manager }}" name="contact_manager" required>
                    </div>
                    <div class="col-md-5">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ $konsumen->email }}" name="email" required>
                    </div>
                    <div class="col-md-9">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" value="{{ $konsumen->address }}" name="address" required>
                    </div>
                    <div class="col-md-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" value="{{ $konsumen->city }}" name="city" required>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Please fill description company" id="description_company" name="desc_company" style="height: 100px" required>{{ $konsumen->desc_company }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- End Card --}}

    </div>
@endsection
