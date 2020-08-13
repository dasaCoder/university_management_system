@auth
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{asset('images/icon/logo.png')}}" alt="UniSys" />
        </a>
    </div>
        
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">

                @role('admin')
                    <li>
                        <a href="{{url('admin/dashboard')}}">
                        <i class="fas fa-lock"></i> Home</a>
                    </li>
                    <li class="active has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-graduation-cap"></i>Student</a>
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

                    <li>
                        <a href="{{ url('admin/lecturers')}}">
                            <i class="fas fa-user"></i>Lecturers</a>
                    </li>
                
                @endrole

                @role('student')
                    <li>
                        <a href="{{ url('student')}}">
                            <i class="fas fa-home"></i>Home</a>
                    </li>


                @endrole
            </ul>
        </nav>
    </div>
 
</aside>

@else 

<aside class="menu-sidebar d-none d-lg-block" style="height: fit-content;">

    <div class="logo">
        <a href="#">
            <img src="{{asset('images/icon/logo.png')}}" alt="UniSys" />
        </a>
    </div>
</aside>

@endauth