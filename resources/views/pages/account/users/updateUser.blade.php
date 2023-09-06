@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend>Update User</legend>

        {{-- Formulir Input User --}}
        <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Formulir Data
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('user.update', $user->id) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row g-2 mb-3">
                            <label for="single-select-field" class="col-sm-2 col-form-label">Profile</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="name_user" required placeholder="Full Name"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="employed_id" required
                                    placeholder="Employed ID" value="{{ $user->employed_id }}">
                            </div>
                            <div class="col-sm">
                                <input type="date" class="form-control" name="birth_date" required title="Date of Birth"
                                    value="{{ $user->birth_date }}">
                            </div>
                            <div class="col-sm">
                                <select class="form-select" id="gender" name="gender" required>
                                    <option selected value="" disabled>Choose Gender</option>
                                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
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
                                            value="{{ $user->email }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="phone" required
                                            placeholder="Phone Number" value="{{ $user->phone }}">
                                    </div>
                                    <div class="col-sm">
                                        <select class="form-select" name="branch" required>
                                            <option selected value="" disabled>Choose Branch</option>
                                            <option value="PKU" {{ $user->branch == 'PKU' ? 'selected' : '' }}>PKU
                                            </option>
                                            <option value="PNK" {{ $user->branch == 'PNK' ? 'selected' : '' }}>PNK
                                            </option>
                                            <option value="MDN" {{ $user->branch == 'MDN' ? 'selected' : '' }}>MDN
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-sm">
                                        <input type="text" class="form-control" name="username" required
                                            placeholder="Username" value="{{ $user->username }}">
                                    </div>
                                    <div class="col-sm">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="col-sm">
                                        <input type="password" class="form-control" name="password_confirmation"
                                            placeholder="Re-type Password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between g-2">
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure save changes?')">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Formulir Input User --}}
    </div>
@endsection
