@extends('layouts.auth')

@section('content')

<div class="section__content section__content--p30">
    <div class="">
        <div class="">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card au-card">
                            

                            <div class="card-body">
                                <div class="au-message__item-text " style="cursor: pointer;">
                                    @foreach ($data['courses'] as $subcription)
            
                                        <div class="text course-link" style="margin-left:0;padding-left:0" onclick=window.location.href='{{url("lecturer",[$subcription->id,$subcription->course_id])}}'>
                                            <h2 class="name" style="font-size: 26px;">{{$subcription->course->courseId}}</h2>
                                            <p>{{$subcription->course->name}}</p>
                                            <p>{{ $subcription->ac_year}}</p>
                                        </div>
                                        <hr>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


@endsection