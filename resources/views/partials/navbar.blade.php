

{{-- desktop header --}}
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <div style="display:flex"></div>

                <div class="header-button">
                    <div class="account-wrap">


                            @guest
                                <div style=" margin-left: 45px;padding: 9px 0;padding-left: 12px;display:inline;">

                                    <a class="" href="{{url('login')}}">Login</a>
                                </div>
                                <div class="account-item clearfix js-item-menu" style="display:inline;">
                                    <div class="content" style="display:inline; margin-left:20px">
                                        <a class="js-acc-btn" href="#">Register</a>

                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{asset('images/icon/logo.png')}}" alt="logo" />
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="account-dropdown__body">
{{--                                                <div class="account-dropdown__item">--}}
{{--                                                    <a href="{{url('register/student')}}">--}}
{{--                                                        <i class="fas fa-graduation-cap"></i>Register as Student</a>--}}
{{--                                                </div>--}}

                                                <div class="account-dropdown__item">
                                                    <a href="{{url('register/lecturer')}}">
                                                        <i class="fas fa-user"></i>Register as Lecturer</a>
                                                </div>

                                                <div class="account-dropdown__item">
                                                    <a href="{{url('register/financer')}}">
                                                        <i class="fas fa-user"></i>Register as Financer</a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <img src="{{asset('images/icon/avatar-01.jpg')}}" alt="{{Auth::user()->name}}" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{asset('images/icon/avatar-01.jpg')}}" alt="{{Auth::user()->name}}" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{Auth::user()->name}}</a>
                                            </h5>
                                            <span class="email">{{Auth::user()->email}}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{url('admin/dashboard')}}">
                                                <i class="zmdi zmdi-account"></i>Dashboard</a>
                                        </div>

                                    </div>
                                    <div class="account-dropdown__footer">


                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">

                                            <i class="zmdi zmdi-power"></i>
                                             {{ __('Logout') }}
                                         </a>

                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             @csrf
                                         </form>
                                    </div>
                                </div>
                            </div>
                            @endguest

                        </div>
                </div>
            </div>
        </div>
    </div>
</header>
