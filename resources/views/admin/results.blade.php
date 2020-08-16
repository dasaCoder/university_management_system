@extends('layouts.auth')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- student list -->
                <h3 class="title-5 m-b-35">Publish Results</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="rs-select2--light rs-select2--md"  style="width:300px">
                            <form action="{{ url('admin/results')}}" method="get" id="result-form">
                                <select class="js-select2" name="subscription_id">
                                    <option value="">---</option>
                                    @foreach ($data['subscriptions'] as $subscription)
                                        <option value="{{ $subscription->id}}">{{ $subscription->ac_year." ".$subscription->semester." ".$subscription->course->course_id}}</option>
                                    @endforeach

                                </select>
                                <div class="dropDownSelect2"></div>
                            </form>
                        </div>
                        
                        <button class="au-btn-filter" onclick="event.preventDefault();
                                                                document.getElementById('result-form').submit();">
                            <i class="zmdi zmdi-filter-list"></i>filter</button>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <h6 class="title-3"> Students List</h6>
                        <br>
                        @if ($data['selected_subscription'] != null)
                        <div class="table-responsive table--no-card m-b-30">
                            
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Student Id</th>
                                        <th>Name</th>
                                        <th></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
                                        @foreach ($data['selected_subscription']->students as $student)
                                            <tr>
                                                <td>{{$student->idStr}}</td>
                                                <td>{{$student->name}}</td>
                                                <td>
                                                    <select class="select-grade" name="grade" id="">
                                                        <option value="">--</option>
                                                        <option value="A">A  </option>
                                                        <option value="A+">A+ </option>
                                                        <option value="A-">A-  </option>
                                                        <option value="B+">B+  </option>
                                                        <option value="B">B  </option>
                                                        <option value="B-">B- </option>
                                                        <option value="C+">C+ </option>
                                                        <option value="C-">C- </option>
                                                    </select>
                                                </td>
                                            </tr>
                                        
                                        @endforeach
                                    
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button id="btn-save-results" class="btn btn-primary" style="float:right">
                                                Save
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                                    @else
                                        <p>No Enrollments</p>
                                    @endif
            </div>
        </div>
    </div>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>

    @if ($data['selected_subscription'] != null)
        <script>
            $("#btn-save-results").on('click',function(){
                var results = $('.select-grade').map((_,el) => el.value).get();
                var data = {};
                data['_token'] = '{{ csrf_token() }}';
                data['results'] = results;
                data['subscriptionId'] = '{{$data['selected_subscription']->id}}';

                console.log(data);

                $.ajax({
                    url: "{{ url('api/admin/result/mass')}}",
                    method: "post",
                    data: data,
                    success: fucntion(){
                        windows.location.reload();
                    }
                });
            });
        </script>
    @endif

@endsection