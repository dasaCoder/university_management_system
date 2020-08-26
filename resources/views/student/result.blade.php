@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- student list -->
                <h3 class="title-5 m-b-35">View Results</h3>
                <form action="{{ url('student/results')}}" method="get" id="">
                <div class="table-data__tool-left">
                    
                        <div class="rs-select2--light rs-select2--md"  style="width:300px">
                            <select class="js-select2" name="ac_year">
                                <option selected value="2019/2020" {{ $selected_ac_year == "2019/2020"? 'selected':'' }}>2019/2020</option>
                                <option value="2020/2021" {{ $selected_ac_year == "2020/2021"? 'selected':'' }}>2020/2021</option>
                                <option value="2021/2022" {{ $selected_ac_year == "2021/2022"? 'selected':'' }}>2021/2022</option>
                                <option value="2022/2023" {{ $selected_ac_year == "2022/2023"? 'selected':'' }}>2022/2023</option>

                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
               
                        <div class="rs-select2--light rs-select2--md"  style="width:300px">
                                <select class="js-select2" name="semester">
                                    <option value="">---</option>
                                    <option value="Semester I" {{ $selected_semester == "Semester I"? 'selected':'' }}>Semester I</option>
                                    <option value="Semester II" {{ $selected_semester == "Semester II"? 'selected':'' }}>Semester II</option>
                                    <option value="Semester III" {{ $selected_semester == "Semester III"? 'selected':'' }}>Semester III</option>
                                    <option value="Semester IV" {{ $selected_semester == "Semester IV"? 'selected':'' }}>Semester IV</option>

                                </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        
                        
                        <button class="au-btn-filter" >
                            <i class="zmdi zmdi-filter-list"></i>filter</button>
                            
                        </div>
                    </form>
                        
            </div>
        </div>
    </div>

        @if (isset($data['selected_results']))
            
            <div class="col-md-5">
                <h6 class="title-3"> Result List</h6>
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

                            @foreach ($data['selected_results'] as $result)                                
                                    
                                    <tr>
                                        <td>{{ $result->enrollment->course->courseId}}</td>
                                        <td>{{ $result->grade }}</td>
                                    </tr>

                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        </div>
    </div>
@endsection