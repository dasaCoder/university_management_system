@extends('layouts.auth')

@section('content')
   
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
            
        </div>
    </div>
    {{-- end shedule --}}

    {{-- create lecture --}}



@endsection
