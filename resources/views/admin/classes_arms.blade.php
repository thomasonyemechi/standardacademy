@extends('layout.admin')

@section('page_title')
    Manage Category & Arms
@endsection
@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <h3 class="card-title ">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                Add Class Category
                            </h3>
                        </div>
                        <div class="card-body  pb-2">
                            <form action="/admin/create-class-category" method="post" id="createClassCategory">@csrf
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" name="category" class="form-control"
                                        placeholder="Enter Class Category i.e JSS, PRY, SSS">
                                </div>
                                <div class="form-group float-right">
                                    <button class="btn btn-secondary mt-2">Add Category</button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title ">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                    Class Categories
                                </h3>
                            </div>
                        </div>
                        <div class="card-body p-1">
                            <div class="table-responsive">
                                <table id="example1" class="table mb-0 table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td> {{ $category->category }} </td>
                                                <td>
                                                <td>
                                                    <div class="float-right">
                                                        <button class="btn btn-xs btn-primary editCategory"
                                                            data-data='{{ json_encode($category) }}'><i class="fa fa-edit"
                                                                aria-hidden="true"></i></button>
                                                    </div>
                                                </td>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <h3 class="card-title ">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                Add Class Arm
                            </h3>
                        </div>
                        <div class="card-body pb-2">
                            <form action="/admin/create-arm" method="post" id="createArm">@csrf
                                <div class="form-group">
                                    <label>Arm</label>
                                    <input type="text" name="arm" class="form-control"
                                        placeholder="Enter Class Arm i.e A, B, C">
                                </div>
                                <div class="form-group float-right">
                                    <button class="btn btn-secondary mt-2">Add Arm</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title ">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                    Class Arms
                                </h3>
                            </div>
                        </div>
                        <div class="card-body p-1">
                            <div class="table-responsive">
                                <table id="example1" class="table mb-0 table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Arm</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="arm_list_body">
                                        @foreach ($arms as $arm)
                                             <tr>
                                                <td> {{$arm->arm}} </td>
                                                <td>
                                                    <div class="float-right"> 
                                                        <button class="btn btn-xs btn-primary editArm" data-data='{{ json_encode($arm) }}'><i class="fa fa-edit" aria-hidden="true"></i></button>
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




    <div class="modal fade" id="editClassCategoryModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mmt">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/update-class-category" method="post" id="editCategoryForm">@csrf
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" name="category" class="form-control"
                                placeholder="Enter Class Category i.e JSS, PRY, SSS">
                            <input type="hidden" name="category_id">
                        </div>
                        <div class="form-group mt-2 float-right">
                            <button class="btn btn-secondary updateCategory">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="editClassArmModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mmt">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/update-arm" method="post" id="editArmForm">@csrf
                        <div class="form-group">
                            <label>Arm</label>
                            <input type="text" name="arm" class="form-control"
                                placeholder="Enter Class Amr i.e A, B, C">
                            <input type="hidden" name="arm_id">
                        </div>
                        <div class="form-group float-right">
                            <button class="btn btn-secondary mt-2">Update</button>
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
            $('body').on('click', '.editCategory', function() {
                data = $(this).data('data');
                modal = $('#editClassCategoryModal')
                modal.modal('show')
                $(modal).find('input[name="category"]').val(data.category)
                $(modal).find('input[name="category_id"]').val(data.id)
                $(modal).find('.modal-title').html(`Edit Class Category (${data.category})`)
            })

            
            $('body').on('click', '.editArm', function(){
                data = $(this).data('data');
                modal = $('#editClassArmModal')
                modal.modal('show');
                $(modal).find('input[name="arm"]').val(data.arm)
                $(modal).find('input[name="arm_id"]').val(data.id)
                $(modal).find('.modal-title').html(`Edit Class Arm (${data.arm})`)
            });

        })
    </script>
@endpush
