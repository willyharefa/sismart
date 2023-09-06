@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend>Branch Data</legend>

        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible fade show mt-3 text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Formulir Input Branch --}}
        <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Formulir Data
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('branch.store') }}" method="POST" novalidate>
                        @csrf
                        @method('POST')
                        <div class="row g-2 mb-3">
                            <label for="single-select-field" class="col-sm-2 col-form-label">Profile</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="name_branch" required
                                    placeholder="Name Branch" value="{{ old('name_branch') }}">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="npwp" required title="NPWP Branch"
                                    placeholder="NPWP" value="{{ old('npwp') }}">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="phone" required
                                    placeholder="Contact Branch" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="single-select-field" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="address" required title="Address Branch"
                                    value="{{ old('address') }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')">Create
                            Branch</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Formulir Input Branch --}}

        {{-- Table User --}}
        <div class="mt-5">
            <div class="table">
                <table id="example" class="table table-striped nowrap table-sm" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th data-priority="1">Name Branch</th>
                            <th>NPWP</th>
                            <th>Phone Number</th>
                            <th data-priority="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($branches as $key => $branch)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $branch->name_branch }}</td>
                                <td>{{ $branch->npwp }}</td>
                                <td>{{ $branch->phone }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#modalOpen_{{ $branch->id }}">
                                        Open
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalOpen_{{ $branch->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Branch</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="name_branch"
                                                            class="col-sm-4 col-form-label">Profile</label>
                                                        <div class="col-sm">
                                                            <input type="text" class="form-control" id="name_branch" readonly value="{{ $branch->name_branch }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="npwp"
                                                            class="col-sm-4 col-form-label">NPWP</label>
                                                        <div class="col-sm">
                                                            <input type="text" class="form-control" id="npwp" readonly value="{{ $branch->npwp }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="phone_number"
                                                            class="col-sm-4 col-form-label">Phone Number</label>
                                                        <div class="col-sm">
                                                            <input type="text" class="form-control" id="phone_number" readonly value="{{ $branch->phone }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label for="address"
                                                            class="col-sm-4 col-form-label">Address</label>
                                                        <div class="col-sm">
                                                            <input type="text" class="form-control" id="address" readonly value="{{ $branch->address }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ route('branch.edit', $branch->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('branch.destroy', $branch->id) }}" class="d-inline-block" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure delete this ?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        {{-- End Table User --}}
    </div>
@endsection
