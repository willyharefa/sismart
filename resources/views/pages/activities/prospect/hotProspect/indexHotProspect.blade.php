@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <div class="table-responsive mt-5">
            <div class="table">
                <table id="example" class="table table-striped nowrap table-sm" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ticket</th>
                            <th>Company</th>
                            <th>Type Business</th>
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
                            <td>{{ $ticket->type_customer->name_type_customer }}</td>
                            <td>{{ $ticket->type_service->name_service }}</td>
                            <td>{{ $ticket->prospects->type_action->name_action }}</td>
                            <td>Complete</td>
                            <td>
                                <button class="btn btn-sm btn-success">
                                    <i class='bx bx-check-double mt-0'></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection