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
                        
                    </ul>
                </li>
                <li>
                    <a href="{{ url('admin/courses')}}">
                        <i class="fas fa-chart-bar"></i>Courses</a>
                </li>
                
            </ul>
        </nav>
    </div>
</aside>