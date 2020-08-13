@extends('layouts.auth')

@section('content')

<div class="section__content section__content--p30">
    <div class="container">
        <div class="container">
            <div class="row">

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
            </div>
        </div>
    </div>

</div> 
    
@include('partials.chat')
@endsection