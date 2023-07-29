@extends('layout.admin')

@section('page_title')
    Session and Term Setup
@endsection
@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus-square"></i>
                                Create Session
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="/admin/create-session" method="POST">@csrf
                                <div class="form-group">
                                    <label for="">Session</label>
                                    <select name="session" class="form-control select2bs4">
                                        <option selected="selected" disabled>Choose Session</option>
                                        <option>{{ date('Y') - 1 }}/{{ date('Y') }}</option>
                                        <option>{{ date('Y') }}/{{ date('Y') + 1 }}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-0 float-right">
                                    <button type="submit" class="btn btn-secondary mt-2 ">Create
                                        Session</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                Recent Sessions
                            </h3>
                        </div>
                        <div class="table-responsive">
                            <table id="example1" class="table mb-0 table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="2">Session</th>
                                        <th>Session Info</th>
                                    </tr>
                                </thead>
                                <tbody id="session_body">
                                    @foreach ($sessions as $session)
                                        <tr>
                                            <td colspan="2">
                                                {{ $session->session }}
                                            </td>
                                            <td>
                                                <table class="table mb-0 table-bordered table-hover table-striped table-sm">
                                                    <tr>
                                                        <th>Term</th>
                                                        <th>Closes</th>
                                                        <th>Next-Term</th>
                                                        <th></th>
                                                    </tr>


                                                    @foreach ($session->terms as $term)
                                                        <tr  class="{{ ($term->status == 1) ? 'bg-success text-white '  : 'null' }} ">
                                                            <td> {{ term_text($term->term) }}  </td>
                                                            <td> {{ $term->close }}</td>
                                                            <td> {{ $term->resume }}</td>
                                                            <th>
                                                                <button class="btn btn-xs btn-primary editTermInfo"
                                                                    data-data="{{ json_encode($term) }}"><i
                                                                        class="fas fa-edit"></i> Edit</button>
                                                                <a class="btn btn-xs btn-success activateTerm"
                                                                    href="/admin/activate-term/{{ $term->id }}"
                                                                    title="Click to activate term"
                                                                    onclick="return confirm('All activities will be switched to selected term !')">
                                                                    <i class="fa fa-check" aria-hidden="true"></i> Activate
                                                            </a>
                                                            </th>
                                                        </tr>
                                                    @endforeach




                                                </table>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    {{-- <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                Edit School Info
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="" class="row">
                                <div class="col-md-12 form-group">
                                    <label for="">School Name</label>
                                    <input type="text" class="form-control"
                                        value="EL-SHADDAI INTERNATIONAL GROUP OF SCHOOLS, ADA">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="">E-mail</label>
                                    <input type="email" class="form-control" disabled value="elshaddaitesada@gmail.com">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="">Website</label>
                                    <input type="url" class="form-control" placeholder="School website" value="">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Phone Number"
                                        value="08033565423">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="">Alternative Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Phone Number" value="">
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="">Motto</label>
                                    <input type="text" class="form-control" value="">
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="">Address</label>
                                    <textarea name="" id="" class="form-control" cols="3"></textarea>
                                </div>


                                <div class="form-group col-md-12 mb-0 ">
                                    <button type="button" class="btn btn-secondary mt-2 float-right">Update School
                                        Info</button>
                                </div>
                            </form>

                            <hr>
                            <b>Update School Logo</b>
                            <div>
                                <div class="mt-2 d-flex justify-content-center">
                                    <img width="100%"
                                        src="http://127.0.0.1:8000/assets/img/schools/1762192el-shaddai-international-group-of-schools-ada.jpg"
                                        alt="SchoolPetal Logo" class="brand-image img-circle elevation-3"
                                        style="opacity: .5">

                                </div>
                                <button class=" uploadSchoolPics btn btn-secondary btn-block mt-5">Upload New
                                    Photo</button>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>





    <div class="modal fade" id="editTermModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mmt">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/update-term" method="post" id="updateTermForm">@csrf
                        <div class="form-group">
                            <label>Term Closes</label>
                            <input type="date" name="close" class="form-control">
                            <input type="hidden" name="term_id">
                        </div>

                        <div class="form-group">
                            <label>Next Term Begins</label>
                            <input type="date" name="resume" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Term Year</label>
                            <input type="number" name="year" class="form-control">
                        </div>
                        <div class="form-group mt-2 float-right">
                            <button type="submit" class="btn btn-secondary save_updated_term_changes">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection



@push('scripts')
    <script>
        $('body').on('click', '.editTermInfo', function() {
            data = $(this).data('data');
            console.log(data);
            $('#editTermModal').modal('show');
            modal = $('#editTermModal');
            $(modal).find('.modal-title').html(`Edit Info ( Year ${data.year}, ${term_text(data.term)})`)
            $(modal).find('input[name="term_id"]').val(data.id);
            $(modal).find('input[name="year"]').val(data.year);
        });
    </script>
@endpush
