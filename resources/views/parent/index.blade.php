@extends('layout.parent')
@section('page_title')
    Dashboard
@endsection
@section('page_content')
    <div class="row">
        @foreach ($students as $student)
            <div class="col-xl-4 col-lg-6 col-sm-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="profile-photo">
                                <img src="{{ asset($student->photo) }}" width="100" class="img-fluid rounded-circle"
                                    alt="">
                            </div>
                            <h3 class="mt-4 mb-1"> {{$student->lastname}} {{$student->firstname}} {{$student->othername}} </h3>
                            <p class="text-muted"> {{$student->grade->class}} <sup>{{$student->arm->arm}}</sup>  </p>
                            <a class="btn btn-outline-primary btn-rounded mt-3 px-5" href="/guardian/student/{{$student->id}}">Profile</a>
                        </div>


                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">
                                    Gender</span> <strong class="text-muted">{{$student->sex}} </strong></li>
                            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Date Of Birth</span>
                                <strong class="text-muted">{{$student->dob}} </strong></li>
                        </ul>
                    </div>

                
                </div>
            </div>
        @endforeach
    </div>
@endsection
