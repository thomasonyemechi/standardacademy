@extends('layout.admin')

@section('page_title')
    Create Student Profile
@endsection
@section('page_content')
    <link href="{{ asset('assets/vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">


    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-secondary card-outline">
                        <div class="card-header flex-wrap">
                            <h3 class="card-title ">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                Student Details
                            </h3>
                            <div>
                                <a class="btn btn-secondary btn-sm ">See all student </a>
                                <a href="/admin/guardian-record" class="btn btn-secondary btn-sm ">Register Guardian </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/admin/create-student-profile" enctype="multipart/form-data" method="post">@csrf
                                <div class="row">
                                    <div class="col-xl-3 col-lg-4">
                                        <label class="form-label text-primary">Photo<span class="required">*</span></label>
                                        <div class="avatar-upload">
                                            <div class="avatar-preview">
                                                <div id="imagePreview"
                                                    style="background-image: url(images/no-img-avatar.png);">
                                                </div>
                                            </div>
                                            <div class="change-btn mt-2 mb-lg-0 mb-3">
                                                <input type='file' name="image" class="form-control d-none" id="imageUpload"
                                                    accept=".png, .jpg, .jpeg">
                                                <label for="imageUpload"
                                                    class="dlab-upload mb-0 btn btn-primary btn-sm">Choose
                                                    File</label>
                                                <a href="javascript:void"
                                                    class="btn btn-danger light remove-img ms-2 btn-sm">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-8">
                                        <div class="row">
                                            <div class="col-xl-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label text-primary">First
                                                        Name<span class="required">*</span></label>
                                                    <input type="text" name="firstname" class="form-control"
                                                        placeholder="James">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-primary">Date of Birth<span
                                                            class="required">*</span></label>
                                                    <div class="d-flex">
                                                        <input type="date" name="date_of_birth" class="form-control"
                                                            placeholder="2017-06-04" id="datepicker">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-primary">Prospective Class<span
                                                            class="required">*</span></label>
                                                    <select name="class_id" class="form-control">
                                                        <option selected disabled>Select Class..</option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->class }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label text-primary">Registration Number<span
                                                            class="required">*</span></label>
                                                    <input type="text" name="registration_number" class="form-control">

                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label text-primary">Last
                                                        Name<span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="surname"
                                                        placeholder="Wally">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-primary">Other Names
                                                        <span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="other_name">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-primary">Parent<span
                                                            class="required">*</span></label>
                                                    <select name="guardian_id" class="form-control" id="">
                                                        <option selected disabled>Select Guardian</option>
                                                        @foreach ($parents as $parent)
                                                            <option value="{{ $parent->id }}">
                                                                {{ $parent->guardian_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label text-primary">Arm<span
                                                                    class="required">*</span></label>
                                                            <select name="arm_id" class="form-control" id="">
                                                                <option selected disabled>Select arm</option>
                                                                @foreach ($arms as $arm)
                                                                    <option value="{{ $arm->id }}">{{ $arm->arm }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label text-primary">Gender<span
                                                                    class="required">*</span></label>
                                                            <select name="sex" class="form-control" id="">
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <button class="btn btn-primary">Create Profile</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('assets/vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js') }}"></script>

    <script>
        $(function() {

        })
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
        $('.remove-img').on('click', function() {
            var imageUrl = "assets/images/no-img-avatar.png";
            $('.avatar-preview, #imagePreview').removeAttr('style');
            $('#imagePreview').css('background-image', 'url(' + imageUrl + ')');
        });
    </script>
@endpush
