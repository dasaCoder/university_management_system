@extends('layouts.auth')

@section('content')
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
@endsection
