@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend>Data Customer</legend>


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
                            <label for="single-select-field" class="col-sm-2 col-form-label">Profile</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="name_user" required
                                    placeholder="Full Name">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="employed_id" required
                                    placeholder="Employed ID">
                            </div>
                            <div class="col-sm">
                                <input type="date" class="form-control" name="birth_date" required title="Date of Birth">
                            </div>
                            <div class="col-sm">
                                <select class="form-select" id="gender" name="gender" required>
                                    <option selected value="" disabled>Choose Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Authentication</label>
                            <div class="col-sm-10">
                                <div class="row g-2 mb-3">
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" name="email" id="email" required placeholder="example@mitoindonesia.com" title="Email user">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="phone" required placeholder="Phone Number">
                                    </div>
                                    <div class="col-sm">
                                        <select class="form-select" name="branch" required>
                                            <option selected value="" disabled>Choose Branch</option>
                                            <option value="PKU">PKU</option>
                                            <option value="PNK">PNK</option>
                                            <option value="MDN">MDN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-sm">
                                        <input type="text" class="form-control" name="username" required placeholder="Username">
                                    </div>
                                    <div class="col-sm">
                                        <input type="password" class="form-control" name="password" required placeholder="Password">
                                    </div>
                                    <div class="col-sm">
                                        <input type="password" class="form-control" name="password_confirm" required placeholder="Re-type Password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" >Create User</button>
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
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>512.423.131.4</td>
                            <td>John</td>
                            <td>
                                <button class="btn btn-sm btn-info">Show</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>58.434.134.4</td>
                            <td>Rayner</td>
                            <td>
                                <button class="btn btn-sm btn-info">Show</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- End Table User --}}
    </div>
@endsection