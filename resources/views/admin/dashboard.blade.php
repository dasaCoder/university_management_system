@extends('layouts.auth')

@section('content')
{{-- dashboard counts --}}
<div class="container">

    <div class="col-sm-6">
        <h2>Current Semester {{ $current_sem->sem_str}}</h2>
    </div>

    <div class="row m-t-25">

        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="text">
                            <h2>{{ $degrees->count() }}</h2>
                            <span>Degrees</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c3">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="text">
                            <h2>{{$courses->count()}}</h2>
                            <span>Course Modules</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c4">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="text">
                            <h2>{{$students->count()}}</h2>
                            <span>Undergraduates</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- end dashbaord count --}}

{{-- start shedule --}}
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <h2 class="title-1 m-b-25">Today Lecturers</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>Course Module</th>
                            <th>Class</th>
                            <th>Lecturer</th>
                            <th>Time</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($lec_sessions as $session)

                        <tr>
                            <td>{{$session->course->name}}</td>
                            <td>{{$session->ac_year}}</td>
                            <td>{{$session->semSubscription->lecturer->name}}</td>
                            <td>{{ substr($session->start_time,11,5)." - ".substr($session->end_time,11,5) }}</td>
                        </tr>

                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
{{-- end shedule --}}

{{-- create lecture --}}
<div class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <i class="mr-2 fa fa-align-justify"></i>
                        <strong class="card-title" v-if="headerText">Shedule a lecture</strong>
                    </div>
                    <div class="card-body">

                        <form action="{{url('shedule/course')}}" method="post" novalidate="novalidate">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">course</label>
                                <select class="form-control" name="course_id">

                                    @foreach ($courses as $course)
                                    <option value="{{ $course->id}}">{{ $course->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Acacemic Year</label>
                                <select class="form-control" name="ac_year">
                                    <option selected="selected">All</option>
                                    <option value="2019/2020">2019/2020</option>
                                    <option value="2020/2021">2020/2021</option>
                                    <option value="2021/2022">2021/2022</option>
                                    <option value="2022/2023">2022/2023</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Hall</label>
                                <select class="form-control" name="lec_hall">
                                    <option value="A11 202">A11 202</option>
                                    <option value="C11 202">C11 202</option>
                                    <option value="B11 202">B11 202</option>
                                    <option value="A13 204">A13 204</option>
                                </select>
                            </div>


                            <div class="row">
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label for="" class="control-label mb-1">Start Time</label>
                                        <input type='text' name="start_time" class="form-control datetimepicker" />

                                    </div>
                                </div>


                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label for="" class="control-label mb-1">End Time</label>
                                        <input type='text' name="end_time" class="form-control datetimepicker" />

                                    </div>
                                </div>


                            </div>

                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <i class="fa fa-save fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Save</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <i class="mr-2 fa fa-align-justify"></i>
                        <strong class="card-title" v-if="headerText">Change Current Sem</strong>
                    </div>

                    <div class="card-body">
                        <form action="{{url('/semester/change')}}" method="post" novalidate="novalidate">
                            {{ csrf_field() }}



                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Acacemic Year</label>
                                <select class="form-control" name="ac_year">
                                    <option value="2019/2020" selected>2019/2020</option>
                                    <option value="2020/2021">2020/2021</option>
                                    <option value="2021/2022">2021/2022</option>
                                    <option value="2022/2023">2022/2023</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Semester</label>
                                <select class="form-control" name="semester">
                                    <option value="Semester I" selected="selected">Semester I</option>
                                    <option value="Semester II">Semester II</option>
                                    <option value="Semester III">Semester III</option>
                                    <option value="Semester IV">Semester IV</option>
                                </select>
                            </div>

                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <i class="fa fa-save fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Pay</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection