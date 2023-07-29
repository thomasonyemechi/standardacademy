@extends('layout.admin')

@section('page_title')
    Manage Classes
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
                                Classes
                            </h3>
                            <button class="btn btn-secondary btn-sm openClassModal">Create Class</button>
                        </div>
                        <div class="card-body p-1">
                            <div class="table-responsive">
                                <table id="example1" class="table mb-0 table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Class</th>
                                            <th>Category</th>
                                            <th>Students</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($classes as $class)
                                            <tr>
                                                <td>{{ $class->class }}</td>
                                                <td>{{ $class->category->category }}</td>
                                                <td>0</td>
                                                <td>
                                                    <form action="/admin/order-class" method="post" >@csrf
                                                        <div class="align-items-center">
                                                            <input type="hidden" name="action" value="move_up">
                                                            <input type="hidden" name="class_id" value="{{$class->id}}">
                                                            <button class="btn btn-xs btn-default"><i class="fa fa-arrow-circle-up"
                                                                    aria-hidden="true"></i></button>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td>
                                                    <div class="float-right">
                                                        <a href="#"> class-profile <i
                                                                class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
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



    <div class="modal fade" id="createClassModal">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Class </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/create-class" method="post" class="row">@csrf
                        <div class="col-md-6 form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control select2bs4">
                                <option selected disabled>Select Class Category ...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Level</label>
                            <select name="level" class="form-control select2bs4" style="width: 100%;">
                                <option selected disabled>Select Level</option>
                                <option value=1> 1 </option>
                                <option value=2> 2 </option>
                                <option value=3> 3 </option>
                                <option value=4> 4 </option>
                                <option value=5> 5 </option>
                                <option value=6> 6 </option>
                            </select>
                        </div>
                        <div class="col-12 form-group">
                            <button type="submit" class="btn btn-secondary mt-2 createClass float-right ">Create
                                Class</button>
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
            $('.openClassModal').on('click', function() {
                $('#createClassModal').modal('show')
            })
        })
    </script>
@endpush
