@extends('layout.admin')
@section('page_title')
    View Note Contents
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Display Note Content For: {{ $note->grade->class }},
                                {{ $note->subject->subject }}
                                ({{ term_text($note->term->term) }}) </h4>
                        </div>
                    </div>
                    @foreach ($contents as $con)
                        <div class="card">
                            <div class="card-body">

                                <span>Week {{ $con->week }}</span>
                                <h4 class="text-primary">{{ $con->topic }}</h4>
                                {!! $con->content !!}
                                <div>
                                    <div class="badge bg-secondary " style="width: auto">Created :
                                        <b>{{ $con->created_at }}</b>
                                    </div>
                                    <div class="badge bg-info " style="width: auto">Last Update :
                                        <b>{{ $con->updated_at }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {


        })
    </script>
@endpush
