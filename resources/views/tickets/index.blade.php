@extends('main')

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

            <div class="row bg-blue">
                <div class="form-group col-12">
                    <h3 class="head">ALL TRAINS </h3> <hr> 
                </div>
            </div>

            <div class="row m-t-50">
                    @if ($trips->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-condensed table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Train</th>
                                        <th scope="col">Train No</th>
                                        <th scope="col">Departure</th>
                                        <th scope="col">Arrival</th>
                                        <th scope="col">Departure Time</th>
                                        <th scope="col">Arrival Time</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trips as $trip)
                                        <tr>
                                            <th scope="row">{{ $trip->id }}</th>
                                            <td>{{ $trip->train->name }}</td>
                                            <td>{{ $trip->train->number }}</td>
                                            <td>{{ $trip->departure->name }}</td>
                                            <td>{{ $trip->arrival->name }}</td>
                                            <td><dd>{{ date('M j, Y, H:i', strtotime($trip->departure_time))}}</dd></td>
                                            <td><dd>{{ date('M j, Y, H:i', strtotime($trip->arrival_time))}}</dd></td>
                                            <td>{{ $trip->price }}</td>
                                            <td><a href="{{ route('customers.create') }}" class="btn btn-info btn-sm fa fa-book">BOOK NOW</a></td>
                                        </tr>                               
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mx-auto m-t-50">
                            {{-- {{ $trips->links() }} --}}
                        </div>
                    @else
                        <em>No trips available</em>
                    @endif
            </div>
        </div>        
    </div> 
   
@endsection