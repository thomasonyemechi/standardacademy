@extends('layout.admin')

@section('page_title')
    All Contents
@endsection
@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title flex-wrap">
                        <div>
                            <h5>All Grade Note Content</h5>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                    <div class="table-responsive full-data">
                        <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer"
                            id="example-student">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                    </th>
                                    <th>Subject</th>
                                    <th>Term/Session</th>
                                    <th>Class</th>
                                    <th>Topic</th>
                                    <th>Created</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $bg = ['bg-secondary', 'bg-warning', 'bg-success', 'bg-primary', 'bg-danger'];
                                @endphp
                                @foreach ($gross_content as $note)
                                    @php
                                        $bg_c = $bg[rand(0, count($bg) - 1)];
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="checkbox me-0 align-self-center">
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="form-check-input" id="check8"
                                                        required="">
                                                    <label class="custom-control-label" for="check8"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5> {{ $note->subject->subject }} </h5>
                                        </td>

                                        <td>
                                            <span> {{ term_text($note->term->term) }} / {{ $note->term->session->session }}
                                            </span>
                                        </td>

                                        <td>
                                            <div class="badge {{ $bg_c }} ">
                                                {{ $note->grade->class }}
                                            </div>
                                        </td>

                                        <td>
                                            <span> {{$note->contents_count}} </span>
                                        </td>

                                        <td>{{ date('j M, Y', strtotime($note->created_at)) }}</td>


                                        <td>
                                            <div class="dropdown custom-dropdown float-end">
                                                <div class="btn sharp tp-btn " data-bs-toggle="dropdown">
                                                    <svg width="24" height="6" viewBox="0 0 24 6" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M12.0012 0.359985C11.6543 0.359985 11.3109 0.428302 10.9904 0.561035C10.67 0.693767 10.3788 0.888317 10.1335 1.13358C9.88829 1.37883 9.69374 1.67 9.56101 1.99044C9.42828 2.31089 9.35996 2.65434 9.35996 3.00119C9.35996 3.34803 9.42828 3.69148 9.56101 4.01193C9.69374 4.33237 9.88829 4.62354 10.1335 4.8688C10.3788 5.11405 10.67 5.3086 10.9904 5.44134C11.3109 5.57407 11.6543 5.64239 12.0012 5.64239C12.7017 5.64223 13.3734 5.36381 13.8686 4.86837C14.3638 4.37294 14.6419 3.70108 14.6418 3.00059C14.6416 2.3001 14.3632 1.62836 13.8677 1.13315C13.3723 0.637942 12.7004 0.359826 12 0.359985H12.0012ZM3.60116 0.359985C3.25431 0.359985 2.91086 0.428302 2.59042 0.561035C2.26997 0.693767 1.97881 0.888317 1.73355 1.13358C1.48829 1.37883 1.29374 1.67 1.16101 1.99044C1.02828 2.31089 0.959961 2.65434 0.959961 3.00119C0.959961 3.34803 1.02828 3.69148 1.16101 4.01193C1.29374 4.33237 1.48829 4.62354 1.73355 4.8688C1.97881 5.11405 2.26997 5.3086 2.59042 5.44134C2.91086 5.57407 3.25431 5.64239 3.60116 5.64239C4.30165 5.64223 4.97339 5.36381 5.4686 4.86837C5.9638 4.37294 6.24192 3.70108 6.24176 3.00059C6.2416 2.3001 5.96318 1.62836 5.46775 1.13315C4.97231 0.637942 4.30045 0.359826 3.59996 0.359985H3.60116ZM20.4012 0.359985C20.0543 0.359985 19.7109 0.428302 19.3904 0.561035C19.07 0.693767 18.7788 0.888317 18.5336 1.13358C18.2883 1.37883 18.0937 1.67 17.961 1.99044C17.8283 2.31089 17.76 2.65434 17.76 3.00119C17.76 3.34803 17.8283 3.69148 17.961 4.01193C18.0937 4.33237 18.2883 4.62354 18.5336 4.8688C18.7788 5.11405 19.07 5.3086 19.3904 5.44134C19.7109 5.57407 20.0543 5.64239 20.4012 5.64239C21.1017 5.64223 21.7734 5.36381 22.2686 4.86837C22.7638 4.37294 23.0419 3.70108 23.0418 3.00059C23.0416 2.3001 22.7632 1.62836 22.2677 1.13315C21.7723 0.637942 21.1005 0.359826 20.4 0.359985H20.4012Z"
                                                            fill="#A098AE" />
                                                    </svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="/admin/note-content/{{$note->id}}">View Content</a>
                                                    <a class="dropdown-item" href="/admin/delete-note/{{$note->id}}">Delete Note</a>
                                                    <a class="dropdown-item" href="/admin/add-content/{{$note->id}}">Add Note Content</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-end ">
                    {{-- {{ $notes->links('pagination::bootstrap-4') }} --}}
                </div>
            </div>
        </div>
    </div>






    <div class="modal fade" id="feePaymentModal">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Make Fee Payment </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/admin/create-note" class="row">@csrf
                        <div class="col-md-6 form-group">
                            <label>Grade</label>
                            <select name="class_id" class="form-control">
                                <option disabled selected>Select grade</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Subject</label>
                            <select name="subject_id" class="form-control">
                                <option disabled selected>Select Subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mt-2 d-flex justify-content-end form-group">
                            <button type="submit" class="btn btn-secondary float-right make_pay">Make Payment</button>
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
            $('.openfeePaymentModal').on('click', function() {
                $('#feePaymentModal').modal('show')
            })


        })
    </script>
@endpush
