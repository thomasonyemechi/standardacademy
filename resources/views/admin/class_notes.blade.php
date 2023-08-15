@extends('layout.admin')

@section('page_title')
    Class Note
@endsection
@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title flex-wrap">
                        <div>
                            <h5>
                                @if ($grade)
                                    {{ $grade->class }} Notes
                                @else
                                    Grade Note
                                @endif
                            </h5>
                        </div>
                        <div>
                            <form action="">
                                <select name="grade" onchange="submit()" class="form-control">
                                    <option selected disabled>Select Grade</option>
                                    @foreach ($classes as $grade)
                                        <option value="{{ $grade->id }}"> {{ $grade->class }} </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                    <div class="table-responsive full-data">
                        <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer"
                            id="example">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                    </th>
                                    <th>Subject</th>
                                    <th>Term/Session</th>
                                    <th>Class</th>
                                    <th>Content</th>
                                    <th>Created By</th>
                                    <th>Date</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $bg = ['bg-secondary', 'bg-warning', 'bg-success', 'bg-primary', 'bg-danger'];
                                @endphp
                                @foreach ($notes as $note)
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
                                            <span> {{ $note->contents_count }} </span>
                                        </td>

                                        <td>{{ $note->user->name }}</td>
                                        <td>{{ date('j M, Y', strtotime($note->created_at)) }}</td>


                                        <td>

                                            <div class="d-flex justify-content-end text-bold ">
                                                <a href="/admin/note-content/{{ $note->id }}" target="_blank"
                                                    title="View Note Content" class="btn me-2 btn-primary btn-sm py-1 px-2">
                                                    <i class="la la-eye"></i>
                                                </a>
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
