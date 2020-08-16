@extends('layouts.auth')

@section('content')
    {{-- dashboard counts --}}
    <div class="container">
       
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
                                <th >Time</th>
                                
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
            {{-- <div class="col-lg-3">
                <h2 class="title-1 m-b-25">Top countries</h2>
                <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                    <div class="au-card-inner">
                        <div class="table-responsive">
                            <table class="table table-top-countries">
                                <tbody>
                                    <tr>
                                        <td>United States</td>
                                        <td class="text-right">$119,366.96</td>
                                    </tr>
                                    <tr>
                                        <td>Australia</td>
                                        <td class="text-right">$70,261.65</td>
                                    </tr>
                                    <tr>
                                        <td>United Kingdom</td>
                                        <td class="text-right">$46,399.22</td>
                                    </tr>
                                    <tr>
                                        <td>Turkey</td>
                                        <td class="text-right">$35,364.90</td>
                                    </tr>
                                    <tr>
                                        <td>Germany</td>
                                        <td class="text-right">$20,366.96</td>
                                    </tr>
                                    <tr>
                                        <td>France</td>
                                        <td class="text-right">$10,366.96</td>
                                    </tr>
                                    <tr>
                                        <td>Australia</td>
                                        <td class="text-right">$5,366.96</td>
                                    </tr>
                                    <tr>
                                        <td>Italy</td>
                                        <td class="text-right">$1639.32</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
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


@endsection
