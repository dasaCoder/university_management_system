@extends('layouts.auth')

@section('content')

    <div class="container">
            <div class="col-md-12">
                <!-- student list -->
                <h3 class="title-5 m-b-35">View Results</h3>
                    <form action="{{ url('financer/details')}}" method="get" id="">
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
                
                        
                        
                            <button class="au-btn-filter" >
                                <i class="zmdi zmdi-filter-list"></i>filter</button>
                            
                        </div>
                    </form>
                        
            </div>

        <div class="row">
            <div class="col-md-12">
            
            @if (isset($data['students']))
            
                <div class="col-md-12">
                    <h6 class="title-3"> Result List</h6>
                    <br>
                
                    <div class="table-responsive table--no-card m-b-30">
                        
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Student Id</th>
                                    <th>Amount</th>
                                    <th>Payed At</th>
                                
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data['students'] as $std)                                
                                        
                                        <tr>
                                           <td>{{ $std->idStr }}</td>

                                           @if(isset($std->payment))
                                                <td>{{ $std->payment->amount }}</td>
                                                <td>{{ $std->payment->payed_at }}</td>
                                            @else
                                                <td style="color:white; background:#db1e1e;">Not Payed</td>
                                                <td style="color:white; background:#db1e1e;">Not payed</td>
                                           @endif

                                        </tr>

                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            </div>
        </div>
    </div>

@endsection