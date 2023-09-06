@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend>Data Permission</legend>

        {{-- Formulir Input Permission --}}
        <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Formulir Data
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('permission.store') }}" method="POST" novalidate>
                        @csrf
                        @method('POST')
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Type new permission" name="name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Permission</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Formulir Input Permission --}}

        {{-- Table View Permission --}}
        <div class=" mt-5 bg-white p-2 rounded-3 shadow-sm">
            <div class="table">
                <table id="example" class="table table-striped nowrap table-sm" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>read-customer</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- End Table View Permission --}}
    </div>
@endsection