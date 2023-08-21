@extends('layout.admin')

@section('page_title')
    Staff Permissions
@endsection
@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title flex-wrap">
                        <h4> Edit Staff Permissions </h4>
                    </div>
                </div>


                <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                    <div class="table-responsive full-data">
                        <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer"
                            id="example-student">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Reg </th>
                                    <th>Fee </th>
                                    <th>Other</th>
                                </tr>
                            </thead>
                            <tbody id="user_body_list">

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {


            function pullPermission() {
                $.ajax({
                    method: 'get',
                    url: `/api/users-permission`
                }).done(function(res) {
                    body = $('#user_body_list')
                    body.html(``)
                    res.data.data.map((user, index) => {
                        body.append(`
                            <tr class="single">
                                <td class="align-middle">${index+1}</td>
                                <td class="align-middle" >${user.name} (${user.role})</td>
                                <td class="text-center">
                                    <input type="hidden" name="permission_id" value="${user.permission.id}" >
                                    <div class="icheck-primary">
                                        <input type="checkbox" name="reg" value="${(user.permission.student == 1) ? 1 : 0}" ${(user.permission.student == 1) ? 'checked' :''} id="reg${index}">
                                        <label for="reg${index}" data-id="reg${index}" ></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary">
                                        <input type="checkbox" name="fee" value="${(user.permission.bill == 1) ? 1 : 0}" ${(user.permission.bill == 1) ? 'checked' :''} id="fee${index}">
                                        <label for="fee${index}" data-id="fee${index}" ></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary">
                                        <input type="checkbox" name="result" value="${(user.permission.sms == 1) ? 1 : 0}" ${(user.permission.sms == 1) ? 'checked' :''} id="u_result${index}">
                                        <label for="u_result${index}" data-id="u_result${index}"></label>
                                    </div>
                                </td>
                            </tr>
                        `)
                    })


                    body.append(`
                        <tr>
                            <td colspan="12  ">
                                <div class="d-flex justify-content-end" >
                                <button class="btn btn-success save_all me-5"><i class="fas fa-save"></i> Save all changes</button>
                                </div>
                            </td>
                        </tr>
                    `)
                }).fail(function(res) {})
            }
            pullPermission();



            $('body').on('click', 'label', function() {
                label = $(this).data('id');
                inp = $(`#${label}`);
                new_val = (inp.val() == 0) ? 1 : 0;
                inp.val(new_val);
                console.log('res');
            })


   
        })
    </script>
@endpush
