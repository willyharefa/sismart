@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend class="m-3">Type Customers</legend>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- Alert Success --}}
        @if ($message = Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show mt-3 text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert --}}

        @foreach ($errors->all() as $item)
            <div class="alert alert-danger">{{ $item }}</div>
        @endforeach

        <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Formulir Type Customer
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('type-customer.store') }}" method="POST" novalidate>
                        @method('POST')
                        @csrf
                        <div class="row g-2 mb-3">
                            <label for="name_type_customer" class="col-sm-2 col-form-label">Name Type</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="name_type_customer" name="name_type_customer"
                                    placeholder="Name of type customer" required data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Masukan tipe customer baru">
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="detail_action" class="col-sm-2 col-form-label">Description</label>
                            <div class="col">
                                <textarea class="form-control" placeholder="Type description of type customer..." name="desc_type_customer"
                                    id="desc_type_customer" rows="3" required data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Masukan deskripsi dari tipe customer"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Now</button>
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
                            <th data-priority="2">Name Type</th>
                            <th >Description</th>
                            <th data-priority="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($typeCustomers as $key => $type_customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $type_customer->name_type_customer }}</td>
                                <td class="text-wrap">{{ $type_customer->desc_type_customer }}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{ route('type-customer.edit', $type_customer->id) }}">Edit</a>
                                    <button class="btn btn-danger btn-sm">Delete</button>
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
