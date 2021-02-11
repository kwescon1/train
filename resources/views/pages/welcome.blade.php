@extends('main')

    @section('title', ' Welcome - ')

    <style>
        .train1{
            width: 100%;
            height: 90%;
        }
    </style>



@section('content')

    <div class="container">
        <div class="vertical-center" >
            @include('partials._nav')
              
                <div class="row mt-1">
                    <div class="col-12">

                        <div class="card">              
                            <div class="row">
                                <div class="col-7">
                                    <img class="train1" src="assets/images/train1.jpg" alt="Card image cap"> 
                                </div>   
                                <div class="col-5"> 
                                    <div class="card-body body-transparent">
                                        <h4 class="card-title" style="font-size:4vw; color:#5b72e2">Railway Reservation System</h4>
                                    </div>
                                </div>
                            </div>
 
                            <div class="row align-items-start" style=" text-align:center">  
                                <div class="col">
                                    <a href="#">TRAIN ENQUIRY</a>
                                </div>
                                <div class="col">
                                    <a href="#">STATION SCHEDULE</a>
                                </div>
                                <div class="col">
                                    <a href="#">CANCELLED TRAINS</a>
                                </div> 
                                <div class="col">
                                    <a href="{{ route('trains.index') }}">TRAIN BOOKING</a>
                                </div> 
                                <div class="col">
                                    <a href="#">RESCHEDULE TRAINS</a>
                                </div>
                            </div>     
                        </div> 

                    </div>   
               </div>          

                <div class="row bg-white p-5 mt-1 mx-auto">
                    <div class="col-lg-4 col-md-auto"> 
                        <h3 class="head">TRAIN</h3> <hr>                    
                       <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="assets/images/train1.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">STATION ENQUIRY</p>
                            </div>
                        </div> 
                        <br>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="assets/images/train1.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">CANCELLED ENQUIRY</p>
                            </div>
                        </div> 
                        <br>
                    </div>
                    <br>
                    <div class="col-lg-8 col-md-12">
                        <h3 class="head">RAILWAY RESERVATION SYSTEM</h3> <hr>   
                        <p>RRS is to help with the reservation online and make it easier for passengers who want to travel
                           wherever they want to go. It has made everything easier and you will love it very much, trust me.
                           All you have to do is get a better internet connection and you are good to go. OMG!! You are going
                           to love it very very very much.....Let's gooo..
                           
                           <br> <br>
                           RRS is to help with the reservation online and make it easier for passengers who want to travel
                           wherever they want to go. It has made everything easier and you will love it very much, trust me.
                           All you have to do is get a better internet connection and you are good to go. OMG!! You are going
                           to love it very very very much.....Let's gooo..

                            <br> <br>
                           RRS is to help with the reservation online and make it easier for passengers who want to travel
                           wherever they want to go. It has made everything easier and you will love it very much, trust me.
                           All you have to do is get a better internet connection and you are good to go. OMG!! You are going
                           to love it very very very much.....Let's gooo..

                           <br> <br>
                           RRS is to help with the reservation online and make it easier for passengers who want to travel
                           wherever they want to go. It has made everything easier and you will love it very much, trust me.
                           All you have to do is get a better internet connection and you are good to go. OMG!! You are going
                           to love it very very very much.....Let's gooo..
                        </p>
                    </div>
                </div>
        </div>
    </div>
                 
@endsection

