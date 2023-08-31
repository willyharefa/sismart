@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div class=" mt-5">
            <div class="table">
                <table id="example" class="table table-striped nowrap table-sm" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ticket</th>
                            <th>Company</th>
                            <th>Type Service</th>
                            <th>Progress</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $key => $ticket)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ticket->cd_ticket }}</td>
                                <td>{{ $ticket->konsumens->name_company }}</td>
                                <td>{{ $ticket->type_service->name_service }}</td>
                                <td>{{ $ticket->prospects->type_action->name_action }}</td>
                                @if (!$ticket->status_ticket == 'done')
                                <td>Hot Prospect</td>
                                <td>
                                    <form action="{{ route('hot-prospect.update', $ticket->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure mark this as done ?')"><i class='bx bx-check-double'></i></button>
                                    </form>
                                </td>
                                @else
                                <td>Done</td>
                                <td>
                                    <button class="btn btn-sm btn-info">Print</button>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
