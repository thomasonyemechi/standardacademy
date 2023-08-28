@extends('layout.parent')
@section('page_title')
    Dashboard
@endsection
@section('page_content')
    <div class="row">
        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="text-center">
                        <div class="profile-photo">
                            <img src="assets/images/profile/profile.png" width="100" class="img-fluid rounded-circle"
                                alt="">
                        </div>
                        <h3 class="mt-4 mb-1">Deangelo Sena</h3>
                        <p class="text-muted">Senior Manager</p>
                        <a class="btn btn-outline-primary btn-rounded mt-3 px-5" href="javascript:void(0);;">Profile</a>
                    </div>


                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Patient Gender</span> <strong class="text-muted">Female	</strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Years Old</span> 		<strong class="text-muted">Age: 24	</strong></li>
                    </ul>
                </div>

                <div class="card-footer pt-0 pb-0 text-center">
                    <div class="row">
                        <div class="col-4 pt-3 pb-3 border-end">
                            <h3 class="mb-1">150</h3><span>Follower</span>
                        </div>
                        <div class="col-4 pt-3 pb-3 border-end">
                            <h3 class="mb-1">140</h3><span>Place Stay</span>
                        </div>
                        <div class="col-4 pt-3 pb-3">
                            <h3 class="mb-1">45</h3><span>Reviews</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
