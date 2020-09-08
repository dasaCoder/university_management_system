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
           
            
        </div>
        </div>
    </div>

</div> 

@endsection