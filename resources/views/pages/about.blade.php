@extends('main')

    @section('title', ' About - ')


@section('content')

    <div class="container">
        <div class="vertical-center" >
            @include('partials._nav')

            <div class="row mt-1 p-5 bg-white mx-auto">
                <div class="col-8">
                    <h3>ABOUT RAILWAY RESERVATION SYSEM</h3>
                    <p> The Railway Reservation System facilitates the
                     passengers to enquire about the trains available on 
                     the basis of source and destination, Booking and Cancellation 
                     of tickets, enquire about the status of the booked ticket, etc. </p>
                </div> 

                <div class="col-4">
                    <h3>ADVERTISEMENT</h3>
                    <p> -- Nothing to advertise --</p>
                </div> 
            </div>     
        </div> 
    </div>        


@endsection