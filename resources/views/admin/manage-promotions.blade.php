@extends('layout.admin')

@section('page_title')
    Manage Class Promotion
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-4 wow fadeInUp" data-wow-delay="1.5s"
                    style="visibility: visible; animation-delay: 1.5s; animation-name: fadeInUp;">
                    <div class="table-responsive full-data">
                        <table class="table-responsive-sm table display dataTablesCard student-tab dataTable no-footer">
                            <thead>
                                <tr>

                                    <th>Class</th>
                                    <th>Students</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grades as $cla)
                                    <tr>
                                        <td>
                                            <a href="/admin/manage-promotion/{{ $cla->id }}">
                                                <h5>{{ $cla->class }} </h5>
                                            </a>
                                        </td>
                                        <td> {{ $cla->students_count }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="page-title flex-wrap">
                                <h5>Students @if ($grade)
                                        {{ $grade->class }}
                                    @endif
                                </h5>
                            </div>
                        </div>


                        <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s"
                            style="visibility: visible; animation-delay: 1.5s; animation-name: fadeInUp;">
                            <div class="table-responsive full-data">
                                <table
                                    class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer"
                                    id="example-student">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input type="checkbox" class="form-check-input" id="checkAll"
                                                    required="">
                                            </th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($students)
                                            @foreach ($students as $student)
                                                <tr>
                                                    <td>
                                                        <div class="checkbox me-0 align-self-center">
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="checkbox" class="form-check-input "
                                                                    name="pick" id="check8" required=""
                                                                    value="{{ $student->id }}">
                                                                <label class="custom-control-label" for="check8"></label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="trans-list">
                                                            <img src=" {{ asset($student->photo) }} " alt=""
                                                                class="avatar avatar-sm me-3">
                                                            <h4>{{ $student->surname }} {{ $student->firstname }}
                                                            </h4>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="date"> {{ $student->sex }} </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                @if ($students)
                                    <div class="d-flex justify-content-end mt-2 ">
                                        <button class="btn btn-success promote_students me-2">Promote Students</button>
                                        <button class="btn btn-danger demote_students">Demote Students</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(function() {

            function perform(action) {
                url = (action == 'promote') ? 'promote_student' : 'demote_student';
                btn_id = (action == 'promote') ? '.promote_students' : '.demote_students';
                btn_text = (action == 'promote') ? 'Promote' : 'Demote';

                inputs = $('input[name="pick"]')
                data = [];
                inputs.map(inp => {
                    inp = inputs[inp];
                    if (inp.checked) {
                        data.push(inp.value)
                    }
                });
                console.log(data);
                $.ajax({
                    method: 'post',
                    url: '/api/'+`${url}`,
                    data: {
                        data: data
                    },
                    beforeSend: () => {
                        $('.btn').attr('disabled', 'disabled')
                        $(btn_id).html( `<span class="spinner-border spinner-border-sm" aria-hidden="true"></span> <i>...</i>` )
                    }
                }).done(function(res) {
                    alert(res.message);
                    $('.btn').removeAttr('disabled')
                    location.href="";
                }).fail(function(res) {
                    alert('An error occured while performing this action')
                    $('.btn').removeAttr('disabled')
                    console.log(res);
                })
            }


            $('.promote_students').on('click', function() {
                perform('promote')
            })

            $('.demote_students').on('click', function() {
                perform('demote')
            })


        })
    </script>
@endpush
