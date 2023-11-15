@extends('layout.admin')

@section('page_title')
    Transaction Accross Range
@endsection
@section('page_content')
    <div class="row">

        <div class="col-md-4">
            <div class="card card-secondary card-outline">
                <div class="card-body">
                    <form action="" id="dateForm" class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>From </label>
                                <input type="date" name="from" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>TO </label>
                                <input type="date" name="to" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="d-flex justify-content-end mt-2 " >
                                <button class="btn btn-primary">View </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <h4> {{ $date }} Payments </h4>
                </div>


                <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                    <div class="table-responsive full-data">
                        <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer"
                            id="example-student">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Class</th>
                                    <th>Term</th>
                                    <th>Fee</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>By</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($payments as $pay)
                                    <tr>
                                        <td>
                                            <div class="trans-list">
                                                <h4> {{ $pay->student->surname }} {{ $pay->student->firstname }} </h4>
                                            </div>
                                        </td>
                                        <td>{{ $pay->grade->class }}</td>
                                        <td>{{ term_text($pay->term->id) }}</td>
                                        <td>{{ $pay->fee_cat->fee ?? '' }}</td>
                                        <td>
                                            <h4 class="small">{{ money_format($pay->amount) }}</h4>
                                        </td>
                                        <td>
                                            @if ($pay->type == 1)
                                                <div class="badge bg-primary">
                                                    Fee
                                                </div>
                                            @else
                                                <div class="badge bg-success ">
                                                    payment
                                                </div>
                                            @endif

                                        </td>
                                        <td>{{ date('D d M, y | h:i:s a', strtotime($pay->created_at)) }}</td>
                                        <td>{{ $pay->user->name }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-end ">
                    {{ $payments->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
