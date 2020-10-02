@auth
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <h3>Acedamic Pulse</h3>

{{--            <img src="{{asset('images/icon/logo.png')}}" alt="UniSys" />--}}
        </a>
    </div>

    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">

                @role('admin')
                    <li class="active">
                        <a href="{{url('admin')}}">
                        <i class="fas fa-lock"></i> Home</a>
                    </li>
                    <li class="has-sub">
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
                        <a href="#">
                            <i class="fas fa-user"></i>Lecturers</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/results')}}">
                            <i class="fas fa-chart-pie"></i>Results</a>
                    </li>

                    <li>
                        <a href="{{ url('financer')}}">
                            <i class="fas fa-chart-pie"></i>Finance</a>
                    </li>

                @endrole

                @role('student')
                    <li>
                        <a href="{{ url('student')}}">
                            <i class="fas fa-home"></i>Home</a>
                    </li>

                    <li>
                        <a href="{{ url('shedule/today')}}">
                            <i class="fas fa-clock"></i>Time Table</a>
                    </li>

                    <li>
                        <a href="{{ url('student/results')}}">
                            <i class="fas fa-chart-line"></i>Results</a>
                    </li>

                    <li>
                        <a href="{{ url('student/assignments')}}">
                            <i class="fas fa-clock"></i>Assignments</a>
                    </li>


                @endrole

                @role('lecturer')
                    <li class="active">
                        <a href="{{url('lecturer')}}">
                        <i class="fas fa-lock"></i> Home</a>
                    </li>

                    <li>
                        <a href="{{ url('shedule/today')}}">
                            <i class="fas fa-clock"></i>Time Table</a>
                    </li>

                    <li>
                        <a href="{{ url('lecturer/assignments')}}">
                            <i class="fas fa-clock"></i>Assignments</a>
                    </li>
                @endrole

                @role('financer')
                    <li>
                        <a href="{{ url('financer')}}">
                        <i class="fas fa-chart-pie"></i>Finance</a>
                    </li>

                    <li>
                        <a href="{{ url('financer/details')}}">
                        <i class="fas fa-chart-pie"></i>Payment Details</a>
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
            <h3>Acedamic Pulse</h3>

{{--            <img src="{{asset('images/icon/logo.png')}}" alt="UniSys" />--}}
        </a>
    </div>
</aside>

@endauth
