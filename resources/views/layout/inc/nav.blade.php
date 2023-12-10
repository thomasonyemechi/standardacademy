<nav class="navbar-vertical navbar">
    <div class="nav-scroller">

        <ul class="navbar-nav flex-column" id="sideNavbar">

            <li class="nav-item">
                <a class="nav-link py-3" href="#">
                    <h2 class="text-white m-0">Mapet Hospital Pos </h2>
                </a>
            </li>

            <li class="nav-item mb-3">
                <a class="nav-link bg-info p-3 text-white" href="/pos?trno={{ rand(111111,3444444445409) }}">
                    <i class="nav-icon fe fe-home me-2"></i> Point Of Sales
                </a>
            </li>



            <li class="nav-item mb-3">
                <a class="nav-link bg-info p-3 text-white" href="/item/add">
                    <i class="nav-icon fe fe-book me-2"></i> Add New Item
                </a>
            </li>


            <li class="nav-item mb-3">
                <a class="nav-link bg-info p-3 text-white" href="/category/add">
                    <i class="nav-icon fe fe-book me-2"></i> Item Category
                </a>
            </li>



            <li class="nav-item  mb-3">
                <a class="nav-link bg-info p-3 text-white" href="#">
                    <i class="nav-icon fe fe-book me-2"></i>Transactions History
                </a>
            </li>


            <li class="nav-item mb-3">
                <a class="nav-link bg-info p-3 text-white" href="#">
                    <i class="nav-icon fe fe-book me-2"></i>Today's Sales
                </a>
            </li>

            <li class="nav-item mb-3">
                <a class="nav-link bg-info p-3 text-white" href="#">
                    <i class="nav-icon fe fe-book me-2"></i>Account Overview
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link bg-info p-3 text-white" href="#">
                    <i class="nav-icon fe fe-arrow-left me-2"></i>Back To Dashboard
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link  collapsed " href="#!" data-bs-toggle="collapse"
                    data-bs-target="#navAuthentication" aria-expanded="false" aria-controls="navAuthentication">
                    <i class="nav-icon fe fe-lock me-2"></i> Stock Management
                </a>
                <div id="navAuthentication" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="#">Stock Profiler</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="/stock/restock?trno={{ rand(111111,3444444445409) }}">Restock Items</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>

    </div>
</nav>
