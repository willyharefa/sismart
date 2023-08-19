@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend class="m-3">Type Action</legend>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert --}}

        <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Formulir Action
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('type-action.store') }}" method="POST" novalidate>
                        @csrf
                        @method('POST')
                        <div class="row g-2 mb-3">
                            <label for="name_action" class="col-sm-2 col-form-label">Name Action</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name_action" name="name_action" placeholder="Name of action" required>
                            </div>
                            <div class="col-sm">
                                <select class="form-select" name="status_action" required>
                                    <option selected value="">Choose Categories...</option>
                                    <option value="Prospect">Prospect</option>
                                    <option value="Hot Prospect">Hot Prospect</option>
                                  </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="detail_action" class="col-sm-2 col-form-label">Description</label>
                            <div class="col">
                                <textarea class="form-control" placeholder="Type detail of action..." name="detail_action" id="detail_action" rows="3" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Action</button>
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
                            <th data-priority="2">Name Action</th>
                            <th data-priority="3">Category</th>
                            <th data-priority="4">Description</th>
                            <th data-priority="5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($typeActions as $key => $typeAction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $typeAction->name_action }}</td>
                            <td>{{ $typeAction->status_action }}</td>
                            <td>
                                <div class="text-wrap">
                                    {{ $typeAction->detail_action }}
                                </div>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('type-action.edit', $typeAction->id) }}">Edit</a>
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
