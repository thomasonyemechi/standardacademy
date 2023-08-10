@extends('layout.guest')
@section('page_content')
    <section id="singleteacher" class="section-padding">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 offset-md-2 col-12 pl-lg-5 pl-md-3 pl-sm-2 pl-2">
                    <div class="single-teacher-details shadow">
                        <div class="section-title section-title-left mb-4">
                            <h2>Fees</h2>
                        </div>
                        <p>
                            Fee Structure: {{ env('APP_NAME') }} fees are made up of the following:
                        </p>
                        <div class="row mt-4">
                            <div class="col">
                                <div class="itemFullText">
                                    <h3 class="fs-6">1. Tuition</h3>
                                    <p>This may be paid once annually or by the end of the first week of each term. Fees are
                                        adjusted for the new academic year when necessary by 30th June.</p>
                                    <h3>2. Books and Educational Resource Fee</h3>
                                    <p>This is an annual payment which covers the cost of exercise books, home work dairies,
                                        photocopies, stationery and teaching and learning aids in the classroom.</p>
                                    <h3>3. School Lunch</h3>
                                    <p>This fee covers the cost of school lunch provided termly.</p>
                                    <h3>4. Club /Co-curricular Fees</h3>
                                    <p>This is a fee paid per term and it covers the cost of materials and facilitators</p>
                                    <h3>5. School Photographs</h3>
                                    <p>This fee will cover the cost of individual and class photographs for each child</p>
                                    <h3>6. External Examinations /Spring board</h3>
                                    <p>Pupils in Years 2, and 6 are enrolled for Cambridge Checkpoint Examinations.<br>Year
                                        5 and 6 pupils are enrolled for Exam Prep Lessons</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
