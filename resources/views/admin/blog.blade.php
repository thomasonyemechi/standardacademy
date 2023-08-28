@extends('layout.admin')
@php
    $edit = isset($_GET['edit']) ? $_GET['edit'] : 0;
@endphp
@section('page_title')
    @if ($edit)
        Create Post
    @else
        Edit Post
    @endif
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ $edit ? 'Edit' : 'Add' }} Post </h4>
                        </div>
                        <div class="card-body">
                            @if ($edit)
                            <form action="/admin/update-post" enctype="multipart/form-data" method="post">@csrf
                                <div class="row">
                                    <div class="col-md-8 mt-3">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" value="{{$post->title}}"
                                            placeholder="Enter post title">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label>Category</label>
                                        <input type="text" class="form-control" name="category" value="{{$post->category}}"
                                            placeholder="e.g Sports, sports etc">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label>Post Body</label>
                                        <textarea name="body" class="form-control" id="editor1"> {{$post->body}} </textarea>
                                    </div>


                                    <div class="col-md-12">
                                        <div class=" d-flex justify-content-betweeen ">
                                            <label class="mt-2">Dsiplay Image</label>
                                            <input type="file" accept="image" class="form-control mt-2"
                                                name="image">
                                            <input type="hidden" name="id" value="{{$post->id}}"  >
                                        </div>

                                        <div class=" d-flex justify-content-end ">
                                            <button class="btn btn-primary mt-2 ">Update Post</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                                <form action="/admin/create-post" enctype="multipart/form-data" method="post">@csrf
                                    <div class="row">
                                        <div class="col-md-8 mt-3">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="title" value="{{old('title')}}"
                                                placeholder="Enter post title">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label>Category</label>
                                            <input type="text" class="form-control" name="category"  value="{{old('category')}}"
                                                placeholder="e.g Sports, sports etc">
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label>Post Body</label>
                                            <textarea name="body" class="form-control" id="editor1"> {!! old('body') !!} </textarea>
                                        </div>


                                        <div class="col-md-12">
                                            <div class=" d-flex justify-content-betweeen ">
                                                <label class="mt-2">Dsiplay Image</label>
                                                <input type="file" accept="image" class="form-control mt-2"
                                                    name="image">
                                            </div>

                                            <div class=" d-flex justify-content-end ">
                                                <button class="btn btn-primary mt-2 ">Create Post</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>



                    <div class="col-xl-12 wow fadeInUp" data-wow-delay="0.5s"
                        style="visibility: visible; animation-delay: 1.5s; animation-name: fadeInUp;">
                        <div class="table-responsive ">
                            <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer">
                                <thead>
                                    <tr>

                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Created</th>
                                        <th>Updated Last</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>

                                            <td>
                                                <div class="trans-list">
                                                    <img src="{{ asset($post->image) }}"
                                                        alt="" class="avatar avatar-sm me-3">
                                                    <h4>{{ $post->title }} </h4>
                                                </div>
                                            </td>
                                            <td> {{$post->category}} </td>
                                            <td>
                                                <p>{{ date('j M, Y', strtotime($post->created_at)) }}</p>
                                            </td>
                                            <td>
                                                <p>{{ date('j M, Y | h:i:s a', strtotime($post->updated_at)) }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end ">
                                                    <button title="View Post Body"
                                                        class="btn btn-info me-2 btn-sm px-2 py-1 view-content " data-data="{{ json_encode($post) }}" ><i
                                                            class="la la-eye"></i>
                                                    </button>
                                                    <a href="?edit={{ $post->id }}" title="Edit Post"
                                                        class="btn btn-primary me-2 btn-sm px-2 py-1 "><i
                                                            class="la la-edit"></i>
                                                    </a>
                                                    <a href="/admin/delete-post/{{ $post->id }}" onclick="return confirm('Are you sure you want to delete this post')" title="Delete Post"
                                                        class="btn btn-danger me-2 btn-sm px-2 py-1 "><i
                                                            class="la la-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end ">
                            {{ $posts->links('pagination::bootstrap-4') }}
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
                    <h5 class="modal-title">Post Body </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="post-body" style="width: 100%" >

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(function() {
            $('.view-content').on('click', function() {
                var data = $(this).data('data')
                modal = $('#contentModal')
                modal.modal('show')
                modal.find('.post-body').html(` 
                    ${data.body}
                `)
                modal.find('.modal-title').html(` 
                   ${data.title}
                `)
            })

            $('#checkAll').on('click', function() {
                var checked = $(this).is(":checked")
                console.log(checked);
                if (checked == true) {
                    $('.check-me').attr('checked', 'checked');
                } else {
                    $('.check-me').removeAttr('checked');
                }
            })
        })
    </script>
@endpush
