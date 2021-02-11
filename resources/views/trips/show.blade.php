{{-- @extends('main')

@section('title', ' Search Trip - ')

<style>
    .form-group{
        text-align: center;
        color: #0000b3;
    }   
</style>

@section('content')  

    <div class="row bg-white p-5 mt-5">
        <div class="col-12">

        {{ Form::open(['route' => 'trips.store'])}}

            <div class="row bg-blue">
                <div class="form-group col-12">
                    <h1 class="head">NEW BOOKING </h1> <hr> <br>
                </div>
            </div>

            <div class="row">
                <div class="form-group col">
                    <h4>FROM</h4> <br>
                    <hr>
                </div>

                <div class="form-group col">
                    <h2>STN<h2>
                </div>

                <div class="form-group col">
                    <h4>{{ Form::label('start_station', 'Station Name') }}</h4>
                    {{ Form::text('start_station', null, array('class' => 'form-control text-up','required', 'data-parsley-maxlength' => '191', 'data-parsley-pattern' => "/^[a-zA-Z -\s]+$/", 'placeholder' => 'STATION NAME', 'autocomplete' => 'off')) }}
                </div>
            </div>  <br>
            
            <div class="row">
                <div class="col form-group">
                    <h4>TO</h4> <br>
                    <hr>
                </div>

                <div class="col form-group">
                    <h2>STN<h2>
                </div>

                <div class="form-group col">
                    <h4>{{ Form::label('end_station', 'Station Name') }}</h4>
                    {{ Form::text('end_station', null, array('class' => 'form-control text-up','required', 'data-parsley-maxlength' => '191', 'data-parsley-pattern' => "/^[a-zA-Z -\s]+$/", 'placeholder' => 'STATION NAME', 'autocomplete' => 'off')) }}
                </div>
            </div>  <br>
            
            <div class="row">
                <div class="form-group col">
                    <h4>{{ Form::label('journey_date', 'DEPART DATE') }}</h4>   
                    {{ Form::date('journey_date', \Carbon\Carbon::now(), array('class' => 'form-control','required')) }}
                </div>

                <div class="form-group col">
                   <h4>{{ Form::label('journey_date', 'RETURN DATE') }}</h4>   
                    {{ Form::date('journey_date', \Carbon\Carbon::now(), array('class' => 'form-control','required')) }}
                </div>
            </div>  <br>

            <div class="row">
                <div class="col">
                    <div class="form-group m-l-3">
                        <a href="{{ route('trips.index', $trips->id) }}" class="btn btn-primary btn-lg btn-block">Search Trip</a>
                    </div>  
                </div>
            </div> 
        {{ Form::close() }}     

        </div>        
    </div>
@endsection     --}}