@extends('main')

@section('title', ' Welcome - ')

{{-- @section('stylesheets')
    {!! Html::style('assets/css/parsley.css') !!}
@endsection --}}

    <style>
        .content-text{
          text-align: center;
          color:white;
        }
    </style>

@section('content')    
        <div class="container">
            @include('partials._message')

                <div class="content-text">
                    <br>
                    <h1><b>RAILWAY RESERVATION SYSTEM</b></h1>
                    <h2>ADD A TRIP</h2> <br>
                </div>
                <hr> <br>

                {!! Form::open(array('route' => 'trips.store', 'data-parsley-validate' => '', 'files' => true)) !!}

                <div class="card border-primary bg-white mb-3">
                    <div class="card-header bg-primary content-text"> ADD TRIP</div>
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-4"> 
                                {{ Form::label('train_id', 'Train') }}
                                <select class="form-control text-up" name="train_id">
                                    @foreach($trains as $train)
                                        <option value='{{ $train->id }}'>{{ $train->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">                    
                               {{ Form::label('departurelocation_id', 'Departure') }}
                                <select class="form-control text-up" name="departurelocation_id">
                                    @foreach($locations as $location)
                                        <option value='{{ $location->id }}'>{{ $location->name}}</option>
                                    @endforeach
                                </select>                          
                            </div>

                            <div class="form-group col-md-4">                    
                               {{ Form::label('arrivallocation_id', 'Arrival') }}
                                <select class="form-control text-up" name="arrivallocation_id">
                                    @foreach($locations as $location)
                                        <option value='{{ $location->id }}'>{{ $location->name}}</option>
                                    @endforeach
                                </select>                          
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('departure_time', 'Departure Time') }}
                                {{ Form::dateTime('departure_time',  \Carbon\Carbon::now()->format('Y-m-d H:i'), array('class' => 'form-control text-up', 'placeholder' => 'DEPARTURE TIME', 'required')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('arrival_time', 'Arrival Time') }}
                                {{ Form::datetime('arrival_time', \Carbon\Carbon::now()->format('Y-m-d H:i'), array('class' => 'form-control text-up', 'placeholder' => 'ARRIVAL TIME')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('price', 'Price') }}
                                {{ Form::text('price', null, array('class' => 'form-control text-up', 'data-parsley-maxlength' => '191', 'placeholder' => 'PRICE', 'autocomplete' => 'off')) }}
                            </div>
                            
                        </div>
                    </div>
                </div>            
                 <br>
 
                <br>      
                
                <div class="card border-primary mb-3">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="form-group col-md-6 m-t-30">
                                {{ Form::submit('Add', array('class' => 'btn btn-primary btn-lg btn-block btn-animated box-shadow'))}}
                            </div>
                            <div class="form-group col-md-6 m-t-30">
                                <a href="" class="btn btn-danger btn-lg btn-block btn-animated-reverse box-shadow"> Clear</a>
                            </div>
                        </div>
                    </div>
                </div>
                       
            {!! Form::close() !!}
        </div>
@endsection

@section('scripts')
    {!! Html::style('assets/js/parsley.min.js') !!}
@endsection

