@extends('layouts.auth')

@section('content')
    <div class="container">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Add a Student</h3>
                            </div>
                            <hr>
                            <form action="{{url('student')}}" method="post" novalidate="novalidate">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Name</label>
                                    <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Email</label>
                                    <input id="email" name="email" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                        autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Password</label>
                                    <input id="password" name="password" type="password" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div>

                                <div class="form-group">
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
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- student list -->
                <h3 class="title-5 m-b-35">Students</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="rs-select2--light rs-select2--md">
                            <select class="js-select2" name="acyear">
                                <option selected="selected">All</option>
                                <option value="">2019/2020</option>
                                <option value="">2020/2021</option>
                                <option value="">2021/2022</option>
                                <option value="">2022/2023</option>

                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        
                        <button class="au-btn-filter">
                            <i class="zmdi zmdi-filter-list"></i>filter</button>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>email</th>
                                <th>Acedemic Year</th>
                                <th>date created</th>
                                <th>status</th>
                                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($students as $student)
                                
                                <tr class="tr-shadow">
                                    
                                    <td>{{$student->name}}</td>
                                    <td>
                                        <span class="block-email">{{$student->email}}</span>
                                    </td>
                                    <td class="desc">2019/2020</td>
                                    <td>{{$student->created_at}}</td>
                                    <td>
                                        <span class="status--process">Processed</span>
                                    </td>
                                    
                                    <td>
                                        <div class="table-data-feature">
                                        
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="spacer"></tr>
                            
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
@endsection