@extends('main')

@section('title', ' Search Ticket - ')

<style>
    .form-group{
        text-align: center;
        color: #0000b3;
    }   
</style>

@section('content')  

    <div class="row bg-white p-5 mt-5">
        <div class="col-12">

        <form action="{{URL::to('/search')}}" method="GET" role="search">
            <div class="row bg-blue">
                <div class="form-group col-12">
                    <h3 class="head">BOOK YOUR TRAIN TICKET </h3> <hr> <br>
                </div>
            </div>

            <div class="row">
                <div class="form-group col">
                    <h4>FROM</h4> <br>
                    <hr>
                </div>

                <div class="form-group col">
                    <h3>STN<h3>
                </div>

                <div class="form-group col">
                    {{ Form::label('startStation_id', 'Start Station') }}
                    <select class="form-control text-up" name="startStation_id">
                        @foreach($locations as $location)
                            <option value='{{ $location->id }}'>{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>  <br>
            
            <div class="row">
                <div class="col form-group">
                    <h4>TO</h4> <br>
                    <hr>
                </div>

                <div class="col form-group">
                    <h3>STN<h3>
                </div>

                <div class="form-group col">
                    {{ Form::label('endStation_id', 'End Station') }}
                    <select class="form-control text-up" name="endStation_id" >
                        @foreach($locations as $location)
                            <option value='{{ $location->id }}'>{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>  <br>

            <div class="row">
                <div class="col">
                    <div class="form-group m-l-3" name="query" type="get" action="{{ url('/search') }}">
                        {{-- <a href="{{ route('tickets.index') }}" class="btn btn-primary btn-lg btn-block">Search Ticket</a> --}}
                        {{ Form::submit('Search', ['class' => 'btn btn-primary btn-lg active'])}}
                    </div>  
                </div>
            </div> 
        </form>    

        </div>        
    </div>
@endsection    