@extends('layout.student')
@section('page_title')
    Notes
@endsection
@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <ul class="folder-structure dlab-scroll grid" id="folder"  style="height: 100vh" >
                @foreach ($notes as $con)
                    <li>
                        <a href="">
                            <div class="file-list">
                                <div class="dz-media">
                                    <svg width="40" height="30" viewBox="0 0 79 62" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.7"
                                            d="M75.1668 20.5H68.3334V13.6667C68.3343 12.9934 68.2024 12.3266 67.9451 11.7044C67.6879 11.0822 67.3104 10.5168 66.8343 10.0407C66.3583 9.56467 65.7929 9.1872 65.1707 8.92996C64.5485 8.67272 63.8817 8.54078 63.2084 8.54168H37.1563C36.3935 8.54184 35.6403 8.37168 34.9517 8.04362C34.2631 7.71556 33.6564 7.23787 33.1759 6.64543L29.8276 2.52834C29.1893 1.73859 28.3825 1.10165 27.4661 0.664169C26.5498 0.226689 25.5472 -0.000241404 24.5317 4.56815e-06H5.12506C4.45179 -0.000894936 3.78495 0.131054 3.16275 0.38829C2.54055 0.645527 1.97521 1.023 1.49913 1.49908C1.02305 1.97516 0.645583 2.54049 0.388346 3.16269C0.131109 3.78489 -0.000838865 4.45173 6.06388e-05 5.12501V55.6404C-0.00347238 56.4099 0.147413 57.1723 0.443784 57.8824C0.740155 58.5925 1.17599 59.236 1.72548 59.7746C2.26414 60.3241 2.90758 60.7599 3.6177 61.0563C4.32781 61.3527 5.09017 61.5036 5.85965 61.5H63.3622C64.6314 61.4996 65.8665 61.0884 66.8827 60.3278C67.8988 59.5672 68.6415 58.4981 68.9997 57.2804L78.4468 24.8734C78.5942 24.3642 78.6213 23.8278 78.5259 23.3063C78.4306 22.7849 78.2154 22.2928 77.8974 21.8687C77.5793 21.4447 77.1671 21.1003 76.6933 20.8628C76.2194 20.6253 75.6968 20.5011 75.1668 20.5Z"
                                            fill="var(--primary)"></path>
                                        <path
                                            d="M75.1645 20.5H26.6031C25.3352 20.5002 24.1016 20.9115 23.0875 21.6723C22.0733 22.4332 21.3332 23.5024 20.9784 24.7196L11.48 57.2828C11.1252 58.4994 10.3853 59.5681 9.3715 60.3285C8.35766 61.0889 7.12455 61.5 5.85724 61.5H63.3662C64.6343 61.5001 65.8682 61.0889 66.8826 60.3281C67.8971 59.5672 68.6374 58.4978 68.9923 57.2804L78.4446 24.8733C78.5932 24.3641 78.6211 23.8273 78.5262 23.3054C78.4313 22.7836 78.2162 22.2909 77.8979 21.8666C77.5797 21.4423 77.167 21.0979 76.6925 20.8607C76.2181 20.6235 75.6949 20.5 75.1645 20.5Z"
                                            fill="var(--primary)"></path>
                                    </svg>
                                </div>
                                <div class="dz-info">
                                    <a href="#">
                                        <h4 class="title"> {{$con->topic}} </h4>
                                        <span> {{ date('j M, Y', strtotime($con->updated_at))  }} | week {{$con->week}} | {{ $con->note->subject->subject }}</span>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
