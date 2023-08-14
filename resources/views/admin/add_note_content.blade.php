@extends('layout.admin')
@php
    $edit = isset($_GET['edit']) ? $_GET['edit'] : 0;
    $ct = old('content') ? old('content') : session('content');
@endphp
@section('page_title')
    @if ($edit)
        Edit Note Content
    @else
        Add Note Content
    @endif
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{($edit)? 'Edit' : 'Add'}} Content For: {{ $note->grade->class }}, {{ $note->subject->subject }}
                                ({{ term_text($note->term->term) }}) </h4>
                        </div>
                        <div class="card-body">
                            @if ($edit)
                                <form action="/admin/update-content" method="post">@csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Study Week</label>
                                                <select name="week" class="form-control" readonly>
                                                    @for ($i = 1; $i <= 16; $i++)
                                                        <option {{ ($content->id == $i) ? 'selected' : 'disabled' }} value="{{ $i }}">Week {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Topic</label>
                                                <input type="text" name="topic" placeholder="Enter Topic"
                                                    class="form-control" value="{{ $content->topic }}">
                                                <input type="hidden" name="content_id" value="{{ $content->id }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label>Content</label>
                                            <textarea name="content" id="ckeditor"> {!! $content->content !!} </textarea>
                                        </div>
                                        <hr class="mt-3">
                                        <div class="col-md-12 d-flex justify-content-end ">
                                            <button class="btn btn-primary ">Save Note</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="/admin/save-content" method="post">@csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Study Week</label>
                                                <select name="week" class="form-control">
                                                    <option selected disabled>Select week</option>
                                                    @for ($i = 1; $i <= 16; $i++)
                                                        <option value="{{ $i }}">Week {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Topic</label>
                                                <input type="text" name="topic" placeholder="Enter Topic"
                                                    class="form-control" value="{{ old('topic') ?? session('topic') }}">
                                                <input type="hidden" name="note_id" value="{{ $note->id }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label>Content</label>
                                            <textarea name="content" id="ckeditor"> {!! $ct !!} </textarea>
                                        </div>
                                        <hr class="mt-3">
                                        <div class="col-md-12 d-flex justify-content-end ">
                                            <button class="btn btn-primary ">Save Note</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>



                    <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s"
                        style="visibility: visible; animation-delay: 1.5s; animation-name: fadeInUp;">
                        <div class="table-responsive full-data">
                            <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer"
                                id="example-student">
                                <thead>
                                    <tr>

                                        <th>Week</th>
                                        <th>Subject/Class</th>
                                        <th>Topic</th>
                                        <th>Created</th>
                                        <th>By</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contents as $con)
                                        <tr>
                                            <td>
                                                <span>Week {{ $con->week }} </span>
                                            </td>
                                            <td><span
                                                    class="text-primary font-w600">{{ $note->subject->subject }}/{{ $note->grade->class }}
                                                </span></td>
                                            <td>
                                                <div class="date">{{ $con->topic }}</div>
                                            </td>
                                            <td>
                                                <h6 class="mb-0">
                                                    {{ date('j M, Y | h:i:s a', strtotime($con->created_at)) }} </h6>
                                            </td>

                                            <td>{{ $con->user->name }}
                                            </td>

                                            <td>
                                                <div class="dropdown custom-dropdown float-end">
                                                    <div class="btn sharp tp-btn " data-bs-toggle="dropdown">
                                                        <svg width="24" height="6" viewBox="0 0 24 6" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.0012 0.359985C11.6543 0.359985 11.3109 0.428302 10.9904 0.561035C10.67 0.693767 10.3788 0.888317 10.1335 1.13358C9.88829 1.37883 9.69374 1.67 9.56101 1.99044C9.42828 2.31089 9.35996 2.65434 9.35996 3.00119C9.35996 3.34803 9.42828 3.69148 9.56101 4.01193C9.69374 4.33237 9.88829 4.62354 10.1335 4.8688C10.3788 5.11405 10.67 5.3086 10.9904 5.44134C11.3109 5.57407 11.6543 5.64239 12.0012 5.64239C12.7017 5.64223 13.3734 5.36381 13.8686 4.86837C14.3638 4.37294 14.6419 3.70108 14.6418 3.00059C14.6416 2.3001 14.3632 1.62836 13.8677 1.13315C13.3723 0.637942 12.7004 0.359826 12 0.359985H12.0012ZM3.60116 0.359985C3.25431 0.359985 2.91086 0.428302 2.59042 0.561035C2.26997 0.693767 1.97881 0.888317 1.73355 1.13358C1.48829 1.37883 1.29374 1.67 1.16101 1.99044C1.02828 2.31089 0.959961 2.65434 0.959961 3.00119C0.959961 3.34803 1.02828 3.69148 1.16101 4.01193C1.29374 4.33237 1.48829 4.62354 1.73355 4.8688C1.97881 5.11405 2.26997 5.3086 2.59042 5.44134C2.91086 5.57407 3.25431 5.64239 3.60116 5.64239C4.30165 5.64223 4.97339 5.36381 5.4686 4.86837C5.9638 4.37294 6.24192 3.70108 6.24176 3.00059C6.2416 2.3001 5.96318 1.62836 5.46775 1.13315C4.97231 0.637942 4.30045 0.359826 3.59996 0.359985H3.60116ZM20.4012 0.359985C20.0543 0.359985 19.7109 0.428302 19.3904 0.561035C19.07 0.693767 18.7788 0.888317 18.5336 1.13358C18.2883 1.37883 18.0937 1.67 17.961 1.99044C17.8283 2.31089 17.76 2.65434 17.76 3.00119C17.76 3.34803 17.8283 3.69148 17.961 4.01193C18.0937 4.33237 18.2883 4.62354 18.5336 4.8688C18.7788 5.11405 19.07 5.3086 19.3904 5.44134C19.7109 5.57407 20.0543 5.64239 20.4012 5.64239C21.1017 5.64223 21.7734 5.36381 22.2686 4.86837C22.7638 4.37294 23.0419 3.70108 23.0418 3.00059C23.0416 2.3001 22.7632 1.62836 22.2677 1.13315C21.7723 0.637942 21.1005 0.359826 20.4 0.359985H20.4012Z"
                                                                fill="#A098AE"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">View</a>
                                                        <a class="dropdown-item" href="?edit={{ $con->id }}">Edit</a>
                                                        <a class="dropdown-item" href="/admin/delete-content/{{$con->id}}">Delete</a>
                                                    </div>
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
@endsection
@push('scripts')
    <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function() {
            $('.openfeePaymentModal').on('click', function() {
                $('#feePaymentModal').modal('show')
            })


        })
    </script>
@endpush
