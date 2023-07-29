@extends('layout.admin')

@section('page_title')
    Parent/Guardian Records
@endsection
@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-secondary card-outline">
                        <div class="card-header flex-wrap">
                            <h3 class="card-title ">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                Guardians Record
                            </h3>
                            <button class="btn btn-secondary btn-sm openGuardianModal">Register Guardian</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guardians as $guard)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $guard->guardian_name }}</td>
                                                <td>{{ $guard->guardian_email }}</td>
                                                <td>{{ $guard->guardian_phone }}</td>
                                                <td>{{ $guard->guardian_address }}</td>
                                                <td>
                                                    <button class="btn btn-secondary p-1 btn-sm">See Profile</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addGuardianModal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register Guardian <h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Please Input the guardian info below</p>
                    <form action="/admin/add-guardian" method="post" id="registerGuardian" class="row">@csrf
      
                        <div class=" col-md-4 form-group">
                            <label>Name</label>
                            <input type="text" name="guardian_name" class="form-control" placeholder="Gurdians name" >
                        </div>
                        <div class=" col-md-4 form-group">
                            <label>Home Address</label>
                            <input type="text" name="guardian_address" class="form-control" placeholder="Lekki, Nigeria" >
                        </div>
                        <div class=" col-md-4 form-group">
                            <label>Email Address</label>
                            <input type="email" name="guardian_email" class="form-control" placeholder="mail@gmail.com" >
                        </div>
                        <div class=" col-md-4 form-group">
                            <label>Phone Number</label>
                            <input type="text" name="guardian_phone" class="form-control" placeholder="090000000000" >
                        </div>
                        <div class=" col-md-4 form-group">
                            <label>State of Origin</label>
                            <input type="text" name="state" class="form-control" placeholder="Lagos" >
                        </div>
                        <div class=" col-md-4 form-group">
                            <label>L.G.A</label>
                            <input type="text" name="lga" class="form-control" placeholder="ikeja" >
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-secondary float-right mt-2" >Register Gurdian</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(function() {
            $('.openGuardianModal').on('click', function () {
                $('#addGuardianModal').modal('show');
            })
        })
    </script>
@endpush
