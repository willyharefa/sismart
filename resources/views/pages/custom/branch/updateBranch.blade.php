@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend>Update Data</legend>

        {{-- Formulir Input Branch --}}
        <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Previous Data
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('branch.update', $branch->id) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row g-2 mb-3">
                            <label for="single-select-field" class="col-sm-2 col-form-label">Profile</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="name_branch" required
                                    placeholder="Name Branch" value="{{ old('name_branch', $branch->name_branch) }}">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="npwp" required title="NPWP Branch"
                                    placeholder="NPWP" value="{{ old('npwp', $branch->npwp) }}">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="phone" required
                                    placeholder="Contact Branch" value="{{ old('phone', $branch->phone) }}">
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="single-select-field" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="address" required title="Address Branch"
                                    value="{{ old('address', $branch->address) }}">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{route('branch.index')}}" class="btn btn-secondary">Back Branches</a>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Formulir Input Branch --}}
    </div>
@endsection