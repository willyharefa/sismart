@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend class="m-3">Update Services</legend>

        @foreach ($errors->all() as $item)
            <div class="alert alert-danger">{{ $item }}</div>
        @endforeach

        <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Formulir Services
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('type-service.update', $typeService->id) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row g-2 mb-3">
                            <label for="name_action" class="col-sm-2 col-form-label">Name Services</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="name_service" name="name_service" placeholder="Name of services"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Masukan kategori layanan purna jual anda"
                                value="{{ $typeService->name_service }}"
                                >
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="detail_action" class="col-sm-2 col-form-label">Description</label>
                            <div class="col">
                                <textarea class="form-control" placeholder="Type description of services..." name="desc_service" id="desc_service" rows="3" required
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Masukan deskripsi dari kategori anda"
                                >{{ $typeService->desc_service }}</textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-secondary" href="{{ route('type-service.index') }}">Back To Services</a>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
