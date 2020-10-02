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
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <i class="mr-2 fa fa-align-justify"></i>
                        <strong class="card-title" v-if="headerText">Create Course Subscription for Semester</strong>
                    </div>

                    <div class="card-body">
                        <form action="{{url('/lecturer/assignments')}}" method="post" novalidate="novalidate">
                            {{ csrf_field() }}


                            <select class="js-select2" name="subscription_id">
                                <option value="">---</option>
                                @foreach ($data['subscriptions'] as $subscription)
                                <option value="{{ $subscription->id}}" {{ $data['selected_subscription']? $data['selected_subscription']->id == $subscription->id? 'selected':'' : ''}}>
                                    {{ $subscription->ac_year." ".$subscription->semester." ".$subscription->course->courseId}}
                                </option>
                                @endforeach

                            </select>
                            <div class="dropDownSelect2"></div>

                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>

                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label mb-1">Due Date</label>
                                <input type='text' name="due_date" class="form-control datetimepicker" />

                            </div>

                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <i class="fa fa-save fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Save</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection