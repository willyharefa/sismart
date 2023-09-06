@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend>Role Data</legend>

        {{-- Formulir Input Role --}}
        <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Formulir Data
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('role.store') }}" method="POST" novalidate>
                        @csrf
                        @method('POST')
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Type new role" name="name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Role</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Formulir Input Role --}}

        {{-- Table User --}}
        <div class="mt-5">
            <div class="table">
                <table id="example" class="table table-striped nowrap table-sm" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th data-priority="1">Name Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Director</td>
                            <td>
                                <button class="btn btn-sm btn-success">Permission</button>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        {{-- End Table User --}}
    </div>
@endsection