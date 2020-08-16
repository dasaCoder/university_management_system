@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- student list -->
                <h3 class="title-5 m-b-35">View Results</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="rs-select2--light rs-select2--md"  style="width:300px">
                            <form action="{{ url('admin/results')}}" method="get" id="result-form">
                                <select class="js-select2" name="subscription_id">
                                    <option value="">---</option>
                                    <option value="Semester I">Semester I</option>
                                    <option value="Semester II">Semester II</option>
                                    <option value="Semester III">Semester III</option>
                                    <option value="Semester IV">Semester IV</option>

                                </select>
                                <div class="dropDownSelect2"></div>
                            </form>
                        </div>

                        <div class="rs-select2--light rs-select2--md"  style="width:300px">
                                <select class="js-select2" name="subscription_id">
                                    <option value="">---</option>
                                    <option value="Semester I">SENG 21455</option>
                                    <option value="Semester II">DATA 2548</option>

                                </select>
                                <div class="dropDownSelect2"></div>
                        </div>

                        <button class="au-btn-filter" >
                            <i class="zmdi zmdi-filter-list"></i>filter</button>
                        
                        
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <h6 class="title-3"> Students List</h6>
                <br>
               
                <div class="table-responsive table--no-card m-b-30">
                    
                    <table class="table table-borderless table-striped table-earning">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Grage</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SENG 2145</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>DATA 2145</td>
                                <td>B-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection