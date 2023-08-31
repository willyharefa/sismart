@extends('layouts.dashboard')
@section('content')
    <div class="wrapper-container">
        <legend>Data Customer</legend>
        {{-- Menu Add Customer  --}}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modalAddCustomer">
            + Add Customer
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalAddCustomer" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Formulir Customer</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('konsumens.store') }}" class="row g-3 needs-validation" novalidate
                            method="POST">
                            @csrf
                            <div class="col-md-5">
                                <label for="name-company" class="form-label">Name Company</label>
                                <input type="text" class="form-control" id="name-company" name="name_company" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="type-company" class="form-label">Type</label>
                                <input type="text" class="form-control" id="type-company" name="type_company" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="npwp" class="form-label">NPWP</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="npwp" name="npwp" required>
                                    <div class="invalid-feedback">
                                        Please fill this field !
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="contact-number" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="contact-number" name="contact_number"
                                    required>
                                <div class="invalid-feedback">
                                    Please fill this field !
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="contact-manager" class="form-label">Contact Manager</label>
                                <input type="text" class="form-control" id="contact-manager" name="contact_manager"
                                    required>
                                <div class="invalid-feedback">
                                    Please fill this field !
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">
                                    Please fill this field !
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                                <div class="invalid-feedback">
                                    Please fill this field !
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Please fill this description company" id="desc_company"
                                        style="height: 100px" name="desc_company" required></textarea>
                                    <label for="desc_company">Description Company</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Menu Add Customer --}}

        {{-- Alert Success Add New Customer --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert --}}

        {{-- Table Customer --}}
        <div class="mt-5">
            <div class="table">
                <table id="example" class="table table-striped nowrap table-sm" width="100%">
                    <thead>
                        <tr>
                            <th data-priority="1">#</th>
                            <th data-priority="2">Company</th>
                            <th>Type</th>
                            <th>NPWP</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th data-priority="4">City</th>
                            <th data-priority="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $key => $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->name_company }}</td>
                                <td>{{ $customer->type_company }}</td>
                                <td>{{ $customer->npwp }}</td>
                                <td>{{ $customer->contact_number }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->city }}</td>
                                <td>
                                    <!-- Modal Detail-->
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalDetail_{{ $customer->id }}">
                                        Detail
                                    </button>

                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="modalDetail_{{ $customer->id }}" tabindex="-1" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Biodata Customer</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="mb-3 row">
                                              <label for="name_company" class="col-md-3 col-form-label">Name Company</label>
                                              <div class="col-md-9">
                                                <input type="text" readonly class="form-control-plaintext" id="name_company" value="{{ $customer->name_company }}">
                                              </div>
                                            </div>
                                            <div class="mb-3 row">
                                              <label for="name_company" class="col-md-3 col-form-label">Type Company</label>
                                              <div class="col-md-9">
                                                <input type="text" readonly class="form-control-plaintext" id="name_company" value="{{ $customer->type_company }}">
                                              </div>
                                            </div>
                                            <div class="mb-3 row">
                                              <label for="npwp_company" class="col-md-3 col-form-label">NPWP</label>
                                              <div class="col-md-9">
                                                <input type="text" readonly class="form-control-plaintext" id="npwp_company" value="{{ $customer->npwp }}">
                                              </div>
                                            </div>
                                            <div class="mb-3 row">
                                              <label for="contact_company" class="col-md-3 col-form-label">Contact Number</label>
                                              <div class="col-md-9">
                                                <input type="text" readonly class="form-control-plaintext" id="contact_company" value="{{ $customer->contact_number }}">
                                              </div>
                                            </div>
                                            <div class="mb-3 row">
                                              <label for="pic" class="col-md-3 col-form-label">PIC</label>
                                              <div class="col-md-9">
                                                <input type="text" readonly class="form-control-plaintext" id="pic" value="{{ $customer->contact_manager }}">
                                              </div>
                                            </div>
                                            <div class="mb-3 row">
                                              <label for="email" class="col-md-3 col-form-label">Email</label>
                                              <div class="col-md-9">
                                                <input type="text" readonly class="form-control-plaintext" id="email" value="{{ $customer->email }}">
                                              </div>
                                            </div>
                                            <div class="mb-3 row">
                                              <label for="address" class="col-md-3 col-form-label">Address</label>
                                              <div class="col-md-9">
                                                <input type="text" readonly class="form-control-plaintext" id="address" value="{{ $customer->address }}">
                                              </div>
                                            </div>
                                            <div class="mb-3 row">
                                              <label for="city" class="col-md-3 col-form-label">City</label>
                                              <div class="col-md-9">
                                                <input type="text" readonly class="form-control-plaintext" id="city" value="{{ $customer->city }}">
                                              </div>
                                            </div>
                                            <div class="mb-3 row">
                                              <label for="city" class="col-md-3 col-form-label">Description Company</label>
                                              <div class="col-md-9">
                                                <textarea readonly class="form-control-plaintext" id="city" rows="3">{{ $customer->desc_company }}</textarea>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <a class="btn btn-warning btn-sm" href="{{ route('konsumens.show', $customer->id) }}">Edit</a>
                                    <form action="{{ route('konsumens.destroy', $customer->id) }}" method="POST" class="d-inline-block">
                                      @method('DELETE')
                                      @csrf
                                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- End Table Customer --}}
    </div>
@endsection
