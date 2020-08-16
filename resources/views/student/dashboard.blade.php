@extends('layouts.auth')

@section('content')

<style> 
    .course-link{
        padding: 5px;
    }
    .course-link:hover{
        background: #eafac9;
    }
</style>

<div class="section__content section__content--p30">
    <div class="container">
        <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card au-card">
                            

                            <div class="card-body">
                                <div class="au-message__item-text " style="cursor: pointer;">
                                    @foreach ($data['courses'] as $subcription)
            
                                        <div class="text course-link" style="margin-left:0;padding-left:0" onclick=window.location.href='{{url("student",[$subcription->id,$subcription->course_id])}}'>
                                            <h2 class="name" style="font-size: 26px;">{{$subcription->course->courseId}}</h2>
                                            <p>{{$subcription->course->name}}</p>
                                        </div>
                                        <hr>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                {{-- <div class="row">

                    <div class="col-lg-9">
                        
                        <h3 class="title-2"> Enrolled Courses</h3>
                        <br>
                        <div class="table-responsive table--no-card m-b-30">
                            
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Lecturer Name</th>
                                        <th class="text-right"></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>SENG-25898</td>
                                        <td>Software Engineering</td>
                                        <td>Mr. Test tset</td>
                                        <td class="text-right"></td>
                                        
                                    </tr>

                                    <tr>
                                        <td>SENG-25898</td>
                                        <td>Software Engineering</td>
                                        <td>Mr. Test tset</td>
                                        <td class="text-right"></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>SENG-25898</td>
                                        <td>Software Engineering</td>
                                        <td>Mr. Test tset</td>
                                        <td class="text-right"></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>SENG-25898</td>
                                        <td>Software Engineering</td>
                                        <td>Mr. Test tset</td>
                                        <td class="text-right"></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>SENG-25898</td>
                                        <td>Software Engineering</td>
                                        <td>Mr. Test tset</td>
                                        <td class="text-right"></td>
                                        
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
            
        </div>

        <div class="col-lg-5">
           
            <h2 class="title-1 m-b-25">Enrolled Courses</h2>
            <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                <div class="au-card-inner">
                    <div class="table-responsive">
                        <table class="table table-top-countries">
                            <tbody>

                                @foreach (Auth::user()->enrollments as $enrollment)                                 
                                    <tr>
                                        <td>{{ $enrollment->course->courseId }}</td>
                                        <td><a href='{{ url("student",[$enrollment->id,$enrollment->course_id])}}' class="btn btn-sm btn-view" >View</a> </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
    </div>
        </div>
    </div>

</div> 
    
@include('partials.chat')
@endsection