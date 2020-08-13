<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{asset('images/icon/logo.png')}}" alt="UniSys" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Student</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ url('admin/students')}}">Students</a>
                        </li>
                        <li>
                            <a href="index2.html">Dashboard 2</a>
                        </li>
                        <li>
                            <a href="index3.html">Dashboard 3</a>
                        </li>
                        <li>
                            <a href="index4.html">Dashboard 4</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="chart.html">
                        <i class="fas fa-chart-bar"></i>Charts</a>
                </li>
                
            </ul>
        </nav>
    </div>
</aside>