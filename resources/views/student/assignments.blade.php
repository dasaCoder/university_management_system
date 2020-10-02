@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="">

                    <div class="card au-card">


                        <div class="card-body">
                            <div class="au-message__item-text " style="cursor: pointer;">
                                @foreach ($data['assignments'] as $assignment)

                                <div class="text course-link" style="margin-left:0;padding-left:0">
                                    <h2 class="name" style="font-size: 26px;">{{$assignment->title}}</h2>
                                    <p>{{$assignment->description}}</p>
                                    <p> <i class="fas fa-clock-o"></i> {{ $assignment->due_date}}</p>
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

@endsection