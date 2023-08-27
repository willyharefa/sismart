@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend class="m-3">Update Action</legend>

        {{-- Alert Success --}}
        
        {{-- End Alert --}}

        <div class="wrapper-card">
            <div class="card">
                <div class="card-header">
                    Formulir Action
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('type-action.update', $typeAction->id) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row g-2 mb-3">
                            <label for="name_action" class="col-sm-2 col-form-label">Name Action</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name_action" name="name_action" placeholder="Name of action" 
                                value="{{ $typeAction->name_action }}"
                                required>
                            </div>
                            <div class="col-sm">
                                <select class="form-select" name="status_action" required>
                                    <option selected value="">Choose Categories...</option>
                                    <option value="Prospect" {{ $typeAction->status_action == "Prospect" ? "selected" : "" }}>Prospect</option>
                                    <option value="Hot Prospect" {{ $typeAction->status_action == "Hot Prospect" ? "selected" : "" }}>Hot Prospect</option>
                                </select>
                            </div>
                            <div class="col-sm">
                                <select class="form-select" name="priority_action" required>
                                    <option selected value="">Choose Level...</option>
                                    <option value="prospect" {{ $typeAction->priority_action == "prospect" ? "selected" : "" }}>On Progress</option>
                                    <option value="hot-prospect" {{ $typeAction->priority_action == "hot-prospect" ? "selected" : "" }}>Hot Progress</option>
                                    <option value="final-prospect" {{ $typeAction->priority_action == "final-prospect" ? "selected" : "" }}>Final Progress</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <label for="detail_action" class="col-sm-2 col-form-label">Description</label>
                            <div class="col">
                                <textarea class="form-control" placeholder="Type detail of action..." name="detail_action" id="detail_action" rows="3"
                                required>{{ $typeAction->detail_action }}</textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-secondary" href="{{ route('type-action.index') }}">Back To Action</a>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
