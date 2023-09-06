@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend class="mb-4">Welcome Back, User</legend>

        {{-- Card View --}}
        <div class="row g-2">
            <div class="col-sm">
                <div class="card bg-primary bg-gradient text-white shadow">
                    <div class="card-body">
                        <h5 class="card-title">Customers</h5>
                        <p class="card-text fs-3">239</p>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card bg-success bg-gradient text-white shadow">
                    <div class="card-body">
                        <h5 class="card-title">Progress</h5>
                        <p class="card-text fs-3">2310</p>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card bg-info bg-gradient text-white shadow">
                    <div class="card-body">
                        <h5 class="card-title">Hot Prospect</h5>
                        <p class="card-text fs-3">1024</p>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card bg-danger bg-gradient text-white shadow">
                    <div class="card-body">
                        <h5 class="card-title">Loss Prospect</h5>
                        <p class="card-text fs-3">14</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Card View --}}

        <div class="row g-2 wrapper-latest-prospect">
            <div class="col-md-8">
                {{-- Table User --}}
                <div class="p-3 rounded-3 mt-5 shadow">
                    <div class="fs-5 mb-4">Latest Hot Prospect</div>
                    <table class="table table-hover table-borderless">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th data-priority="1">Name Customer</th>
                                <th>Sales</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>PT Manhanttan</td>
                                <td>Yudha</td>
                                <td>Supply & Maintenance</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>PDAM Bengkalis</td>
                                <td>Yudha</td>
                                <td>Supply & Maintenance</td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>PDAM Duri</td>
                                <td>Sintia</td>
                                <td>Supply & Maintenance</td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td>Swizz Bell</td>
                                <td>Yudha</td>
                                <td>Supply & Maintenance</td>
                            </tr>
                            <tr>
                                <th>5</th>
                                <td>RS Pekanbaru</td>
                                <td>Sintia</td>
                                <td>Supply & Maintenance</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- End Table User --}}

            </div>
            <div class="col-sm">
                {{-- Table --}}
                <div class="p-3 rounded-3 mt-5 shadow">
                    <div class="fs-5 mb-4">USERS LIST</div>
                    <table class="table table-hover table-borderless">
                        <thead>
                            <tr>
                                <th style="width: 80px" class="text-center">#</th>
                                <th>Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ Vite::asset('resources/assets/img/avatars/avatar_1.png') }}" class="img-fluid">
                                </td>
                                <td>Yudha Satria</td>
                            </tr>
                            <tr>
                                <td><img src="{{ Vite::asset('resources/assets/img/avatars/avatar_1.png') }}" class="img-fluid"></td>
                                <td>Sintia Sari</td>
                            </tr>
                            <tr>
                                <td><img src="{{ Vite::asset('resources/assets/img/avatars/avatar_1.png') }}" class="img-fluid"></td>
                                <td>Elsy</td>
                            </tr>
                            <tr>
                                <td><img src="{{ Vite::asset('resources/assets/img/avatars/avatar_1.png') }}" class="img-fluid"></td>
                                <td>Yokomora</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- End Table --}}
            </div>
        </div>



    </div>
@endsection
