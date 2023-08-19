@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend class="m-3">Update Customer</legend>

        @foreach ($errors->all() as $item)
            <div class="alert alert-danger">{{ $item }}</div>
        @endforeach

        <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Formulir update
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('type-customer.update', $typeCustomer->id) }}" method="POST" novalidate>
                        @method('PUT')
                        @csrf
                        <div class="row g-2 mb-3">
                            <label for="name_type_customer" class="col-sm-2 col-form-label">Name Type</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="name_type_customer" name="name_type_customer"
                                    placeholder="Name of type customer" required data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Masukan tipe customer baru"
                                    value="{{ $typeCustomer->name_type_customer }}"
                                    >
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="detail_action" class="col-sm-2 col-form-label">Description</label>
                            <div class="col">
                                <textarea class="form-control" placeholder="Type description of type customer..." name="desc_type_customer"
                                    id="desc_type_customer" rows="3" required data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Masukan deskripsi dari tipe customer">{{ $typeCustomer->desc_type_customer }}</textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-secondary" href="{{ route('type-customer.index') }}">Back Home</a>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
