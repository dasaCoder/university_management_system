@extends('layouts.auth')

@section('content')

    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <i class="mr-2 fa fa-align-justify"></i>
                            <strong class="card-title" v-if="headerText">Create Course Subscription for Semester</strong>
                        </div>

                        <div class="card-body">
                            <form action="{{url('course/subscription')}}" method="post" novalidate="novalidate">
                                {{ csrf_field() }}
                                

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Course Module</label>                                    
                                    <select class="form-control" name="course_id">

                                        @foreach ($data['courses'] as $course)
                                            <option value="{{ $course->id}}">{{ $course->name }}</option>
                                        @endforeach

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
                                    <label for="cc-payment" class="control-label mb-1">Lecturer</label>                                    
                                    <select class="form-control" name="lecturer_id">

                                        @foreach ($data['lecturers'] as $lecturer)
                                            <option value="{{ $lecturer->id}}">{{ $lecturer->name }}</option>
                                        @endforeach

                                    </select>
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

@endsection