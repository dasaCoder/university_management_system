@extends('layouts.auth')

@section('content')
   
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Add a Course</h3>
                            </div>
                            <hr>
                            <form action="{{url('course')}}" method="post" novalidate="novalidate">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Name</label>
                                    <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div>
                            

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Course Code</label>
                                    <input id="courseId" name="courseId" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Degree</label>                                    
                                    <select class="form-control" name="degreeId">

                                        @foreach ($degrees as $degree)
                                            <option value="{{ $degree->id}}">{{ $degree->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Acacemic Year</label>
                                    <select class="form-control" name="acyear">
                                        <option selected="selected">All</option>
                                        <option value="">2019/2020</option>
                                        <option value="">2020/2021</option>
                                        <option value="">2021/2022</option>
                                        <option value="">2022/2023</option>
        
                                    </select>
                                </div>


                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-save fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Save</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Add a Degree</h3>
                            </div>
                            <hr>
                            <form action="{{ url('course') }}" method="post" novalidate="novalidate">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Name</label>
                                    <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div>
                              
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Description</label>
                                    <input id="description" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div>

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-save fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Save</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection