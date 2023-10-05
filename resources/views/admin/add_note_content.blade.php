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
                            <h4 class="card-title">{{ $edit ? 'Edit' : 'Add' }} Content For: {{ $note->grade->class }},
                                {{ $note->subject->subject }}
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
                                                        <option {{ $content->id == $i ? 'selected' : 'disabled' }}
                                                            value="{{ $i }}">Week {{ $i }}
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
                                                <input type="hidden" name="class_id"  value="{{ $note->class_id }}" >
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
                                                <div class="d-flex justify-content-end ">
                                                    <a href="?edit={{ $con->id }}" title="Edit Content"
                                                        class="btn btn-primary me-2 btn-sm px-2 py-1 "><i
                                                            class="la la-edit"></i>
                                                    </a>
                                                    <a href="javascript:;" title="View Content"
                                                        class="btn me-2 openContentModal btn-info btn-sm px-2 py-1 "
                                                        data-data="{{ json_encode($con) }}"><i class="la la-eye"></i> </a>
                                                    <a href="/admin/delete-content/{{ $con->id }}"
                                                        title="Delete Content"
                                                        onclick="return confirm('Are you sure you wan to delete this content')"
                                                        class="btn me-2 btn-danger btn-sm px-2 py-1 "><i
                                                            class="la la-trash"></i> </a>
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


    <div class="modal fade" id="contentModal">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Note Content </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="note-body" >

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
            $('.openContentModal').on('click', function() {
                var data = $(this).data('data')
                modal = $('#contentModal')
                modal.modal('show')
                modal.find('.note-body').html(` 
                    ${data.content}
                `)
                modal.find('.modal-title').html(` 
                   Content For Week ${data.week}
                `)
            })
        })
    </script>
@endpush
