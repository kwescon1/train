@extends('main')

@section('title', "Dashboard - ")

@push('css')
    {{ Html::style('css/dashboard.css') }}
@endpush


@section('content')
   
    <div class="container">
        <div class="vertical-center" >
                
            <div class="row mt-5 p-4 bg-white">
                <div class="col-md-12">
                    <h4>WELCOME TO RAILWAY RESERVATION SYSTEM - ADMIN DASHBOARD</h4>  <hr>
                </div>

                <div class="col-8">   
                    <a class="btn btn-lg btn-block box-shadow m-t-50" href="{{ route('locations.index') }}" role="button">Locations</a>
                    <a class="btn btn-lg btn-block box-shadow m-t-50" href="{{ route('trains.index') }}" role="button">Trains</a>
                    <a class="btn btn-lg btn-block box-shadow m-t-50" href="{{ route('trips.create') }}" role="button">Trips</a>
                    <a class="btn btn-lg btn-block box-shadow m-t-50" href="{{ route('password.request') }}" role="button">Change Passoword</a>
                    {{-- <a class="btn btn-lg btn-block box-shadow m-t-50" href="{{ route('logout') }}" role="button">Logout</a> --}}
                    <a class="btn btn-lg btn-block box-shadow m-t-50" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>            

          
@endsection
          