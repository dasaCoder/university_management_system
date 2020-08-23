@extends('layouts.auth')

@section('content')

<style> 
    .course-link{
        padding: 5px;
    }

    .btn-view{
        color: white;
    border-color: white;
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
                                    <div class="text course-link" style="margin-left:0;padding-left:0" >
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h2 class="name" style="font-size: 26px;">{{$data['course']->courseId}}</h2>
                                                <p>{{$data['course']->name}}</p>
                                            </div>
                                            <div class="col-lg-5">

                                                @if (Auth::user()->enrollments->contains($data['subscription']->id))
                                                    
                                                    <form action="{{url('unenroll')}}" id="unenroll-form" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="text" hidden name="subscriptionId" value="{{ $data['subscription']->id}}">
                                                    </form>
                                                    
                                                    <button type="button" class="btn btn-outline-warning"  onclick="event.preventDefault();
                                                        document.getElementById('unenroll-form').submit();">
                                                            <i class="fa fa-star"></i>&nbsp; Unenroll</button>
                                                @else
                                                
                                                    <form action="{{url('enroll')}}" id="enroll-form" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="text" hidden name="subscriptionId" value="{{ $data['subscription']->id}}">
                                                    </form>
                                                    
                                                    <button type="button" class="btn btn-outline-primary"  onclick="event.preventDefault();
                                                        document.getElementById('enroll-form').submit();">
                                                            <i class="fa fa-star"></i>&nbsp; Enroll</button>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <hr>

                                    <div>
                                        <p>Between Moore's law and the notion of "Internet time," we're constantly being bombarded with more and more information--most of it in the form of disorganized data. Turning this information into useful knowledge is getting harder and harder to do, and it takes time that we just don't have</p>
                                    </div>
                                </div>
<hr>
                        <h6 class="title-3"> Recommended Readings</h6>
                        <br>
                        <div class="table-responsive table--no-card m-b-30">
                            
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Head First Java, 2nd Edition: Sierra, Kathy, Bates</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Head First Java, 2nd Edition: Sierra, Kathy, Bates</td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                
            
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

@endsection