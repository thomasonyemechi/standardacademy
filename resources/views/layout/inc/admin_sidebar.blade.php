<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="" href="/admin/dashboard" aria-expanded="false">
                    <i class="material-symbols-outlined">home</i>
                    <span class="nav-text">Dashboard</span>
                </a>

            </li>

            @if ($role == 'administrator')
                <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">school</i>
                        <span class="nav-text">Student</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="/admin/guardian-record">Add Guardian</a></li>
                        <li><a href="/admin/add-student">Add New Student</a></li>
                        <li><a href="/admin/students">Student List</a></li>
                    </ul>

                </li>

                <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">person</i>
                        <span class="nav-text">Teachers/Staffs</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="/admin/add-staff">Create Staff Profile</a></li>
                        <li><a href="/admin/staffs">Staff List</a></li>
                        {{-- <li><a href="/admin/staff-perimssion">Staff Permission</a></li> --}}
                    </ul>

                </li>


                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-icons">subject</i>
                        <span class="nav-text">Class & Subject</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="/admin/manage-class">Create Class</a></li>
                        <li><a href="/admin/class-arms">Arms / Category</a></li>
                        <li><a href="/admin/manage-subject">Create Subject</a></li>
                        <li><a href="/admin/manage-promotion">Manage Promotions</a></li>
                    </ul>
                </li>


                <li>
                    <a class="has-arrow" href="javascript:void(0);"  aria-expanded="false">
                        <i class="material-symbols-outlined">payments</i>
                        <span class="nav-text">Manage Fees</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="/admin/manage-levy">Set School Fees</a></li>
                        <li><a href="#">All Fee Payments</a></li>
                        <li><a href="#">Daily Payments</a></li>
                        <li><a href="#">Weekly Payments</a></li>
                        <li><a href="#">Date-range</a></li>
                    </ul>
                </li>

                <li>
                    <a class="" href="/admin/term-setup" aria-expanded="false">
                        <i class="material-icons">article</i>
                        <span class="nav-text">Session and Term</span>
                    </a>
                </li>
            @endif


            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-icons">description</i>
                    <span class="nav-text">Note/Assignment</span>
                </a>
                <ul aria-expanded="false">
                    @if ($user->grade)
                        <li><a href="/admin/create-note">Create Note</a></li>
                        <li><a href="/admin/create-assignment"> <i class="la la-plus text-white "></i>Assignment</a>
                        </li>
                    @endif

                    @if ($role == 'administrator')
                        <li><a href="/admin/class-notes">Class Note</a></li>
                        <li><a href="/admin/class-assignment">View Assignment</a></li>
                    @endif



                </ul>
            </li>

            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-icons">grade</i>
                    <span class="nav-text">Grade Result</span>
                </a>
                <ul aria-expanded="false">
                    @if ($user->grade)
                        <li><a href="/admin/upload-result">Upload Result </a></li>
                        <li><a href="/admin/broad-sheet">Class Broad Sheet</a></li>
                    @endif
                    <li><a href="#">Class Broad Sheet</a></li>
                    <li><a href="#">Result Setup</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-icons">computer</i>
                    <span class="nav-text">School CBT</span>
                </a>
                <ul aria-expanded="false">
                    @if ($role == 'administrator')
                        <li><a href="/admin/exam-types">Exam Types</a></li>
                        <li><a href="/admin/question-bank">Question Bank</a></li>
                    @endif

                    @if ($user->grade)
                        <li><a href="/admin/class-exams">Class Exams</a></li>
                    @endif
                </ul>
            </li>

            @if ($role == 'administrator')
                <li>
                    <a class="" href="/admin/prospective/create-exam" aria-expanded="false">
                        <i class="material-icons">login</i>
                        <span class="nav-text">Entrance Exams</span>
                    </a>
                </li>
            @endif



            </li>

        </ul>
        <div class="copyright">
            <p><strong>School Dashboard</strong></p>
            <p class="fs-12">Made with <span class="heart"></span> by bitech</p>
        </div>
    </div>
</div>
