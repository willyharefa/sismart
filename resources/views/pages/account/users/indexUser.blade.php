@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend>Data Customer</legend>

        @foreach ($errors->all() as $message)
            <div class="alert alert-danger alert-dismissible fade show mt-3 text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Success --}}


        @foreach ($errors->all() as $message)
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @endforeach


        {{-- Formulir Input User --}}
        <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Formulir Data
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('user.store') }}" method="POST" novalidate>
                        @csrf
                        @method('POST')
                        <div class="row g-2 mb-3">
                            <label for="name_user" class="col-sm-2 col-form-label">Profile</label>
                            <div class="col-sm-3">
<<<<<<< HEAD
                                <input type="text" class="form-control" name="name_user" required placeholder="Full Name"
                                    value="{{ old('name_user') }}">
=======
                                <input type="text" class="form-control" id="name_user" name="name_user" required
                                    placeholder="Full Name" autocomplete="true">
>>>>>>> 54454f4e3ad0724fd35146ef54d066f242ccca98
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="employed_id" required
                                    placeholder="Employed ID" value="{{ old('employed_id') }}">
                            </div>
                            <div class="col-sm">
                                <input type="date" class="form-control" name="birth_date" required title="Date of Birth"
                                    value="{{ old('birth_date') }}">
                            </div>
                            <div class="col-sm">
                                <select class="form-select" id="gender" name="gender" required>
                                    <option selected value="" disabled>Choose Gender</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Authentication</label>
                            <div class="col-sm-10">
                                <div class="row g-2 mb-3">
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" name="email" id="email" required
                                            placeholder="example@mitoindonesia.com" title="Email user"
                                            value="{{ old('email') }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="phone" required
                                            placeholder="Phone Number" value="{{ old('phone') }}">
                                    </div>
                                    <div class="col-sm">
                                        <select class="form-select" name="branch" required>
                                            <option selected value="" disabled>Choose Branch</option>
                                            <option value="PKU" {{ old('branch') == 'PKU' ? 'selected' : '' }}>PKU
                                            </option>
                                            <option value="PNK" {{ old('branch') == 'PNK' ? 'selected' : '' }}>PNK
                                            </option>
                                            <option value="MDN" {{ old('branch') == 'MDN' ? 'selected' : '' }}>MDN
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-sm">
                                        <input type="text" class="form-control" name="username" required
                                            placeholder="Username" value="{{ old('username') }}">
                                    </div>
                                    <div class="col-sm">
                                        <input type="password" class="form-control" name="password" required
                                            placeholder="Password">
                                    </div>
                                    <div class="col-sm">
<<<<<<< HEAD
                                        <input type="password" class="form-control" name="password_confirmation" required
                                            placeholder="Re-type Password">
=======
                                        <input type="password" class="form-control" name="password_confirmation" required placeholder="Re-type Password">
>>>>>>> 54454f4e3ad0724fd35146ef54d066f242ccca98
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Create User</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Formulir Input User --}}


        {{-- Table User --}}
        <div class="mt-5">
            <div class="table">
                <table id="example" class="table table-striped nowrap table-sm" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employed ID</th>
                            <th data-priority="1">Name</th>
                            <th>Phone</th>
                            <th>Branch</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->employed_id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->branch }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop_{{$user->id}}">
                                        Open
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop_{{$user->id}}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Data user</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="employed_id"
                                                            class="col-sm-2 col-form-label">Employed ID</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" readonly id="employed_id" value="{{ $user->employed_id }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="name_user"
                                                            class="col-sm-2 col-form-label">Full name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control"
                                                                id="name_user" readonly value="{{$user->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="birth_date"
                                                            class="col-sm-2 col-form-label text-wrap">Birth Date / Gender </label>
                                                        <div class="col-sm-10">
                                                            <div class="row g-2 mb-3">
                                                                <div class="col-sm">
                                                                    <input type="text" class="form-control"
                                                                        id="birth_date" readonly value="{{ date('d F Y', strtotime($user->birth_date))}}">
                                                                </div>
                                                                <div class="col-sm">
                                                                    <input type="text" class="form-control"
                                                                        id="gender" readonly value="{{$user->gender}}">
                                                                </div>
                                                            </div>
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
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
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
