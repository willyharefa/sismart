@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend class="m-3">Type Services</legend>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 text-black" role="alert">
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
                    Formulir Services
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('type-service.store') }}" method="POST" novalidate>
                        @method('POST')
                        @csrf
                        <div class="row g-2 mb-3">
                            <label for="name_action" class="col-sm-2 col-form-label">Name Services</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="name_service" name="name_service"
                                    placeholder="Name of services" required data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Masukan kategori layanan purna jual anda">
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="detail_action" class="col-sm-2 col-form-label">Description</label>
                            <div class="col">
                                <textarea class="form-control" placeholder="Type description of services..." name="desc_service" id="desc_service"
                                    rows="3" required data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Masukan deskripsi dari kategori anda"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Services</button>
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
                            <th data-priority="2">Name Services</th>
                            <th data-priority="4">Description</th>
                            <th data-priority="5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($type_services as $key => $type_service)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $type_service->name_service }}</td>
                                <td>{{ $type_service->desc_service }}</td>
                                <td>
                                    {{-- <button class="btn btn-warning">Edit</button> --}}
                                    {{-- <div class="d-flex"> --}}
                                    <a href="{{ route('type-service.edit', $type_service->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('type-service.destroy', $type_service->id) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"
                                            onclick="return confirm('Are you sure delete this data?')">Delete</button>
                                    </form>
                                    {{-- </div> --}}
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
