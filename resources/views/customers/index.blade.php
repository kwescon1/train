@extends('main')

@section('title', "Passengers - ")

{{-- <style>
table th, td {
    border:solid 1px #fab; 
    width:100px;
    word-wrap:break-word;
    text-align:center
    }
</style> --}}

@section('content')
    <div class="container-fluid py-3 px-0">
        <div class="card mt-5">
            <div class="card-header bg-primary">
                <h2>All Registered Passengers</h2>
            </div>
            <div class="card-body data-background">
                <div class="container-fluid">
                    <div class = "row m-t-5">
                        <div class="col-md-4">
                            {{-- <h1>customers</h1> --}}
                        </div>
                        <div class="col-md-8 text-right">
                            <a href="{{ route('customers.create') }}" class="btn btn-primary btn-h3-spacing">Add customer</a>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-customer-tab" data-toggle="tab" href="#nav-customer" role="tab" aria-controls="nav-customer" aria-selected="true">
                                        Customers <span class="badge badge-primary">{{ count($customers) }}</span>
                                    </a>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-customer" role="tabpanel" aria-labelledby="nav-customer-tab">
                                        @if ($customers->count() > 0)
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            {{-- <th scope="col">customerSHIP NO: </th> --}}
                                                            <th scope="col">NAME</th>
                                                            <th scope="col">GENDER</th>
                                                            <th scope="col">AGE</th>
                                                            <th scope="col">ACTIONS</th>
                                                            {{-- <th scope="col" colspan="2" class="text-center">ACTIONS</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($customers as $customer)
                                                            <tr>
                                                                <th scope="row">{{ $customer->id }}</th>
                                                                {{-- <td class="text-up">{{$customer->customer_id}}</td> --}}
                                                                <td>{{$customer->name}}</td>
                                                                <td>{{$customer->gender }}</td>
                                                                <td>{{ $customer->age}}</td>
                                                                <td><a href="{{ route('#', $customer->id) }}" class="fa fa-eye"></a></td>
                                                                
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                                <div class="mx-auto m-t-50">
                                                    {!! $customers->links(); !!}
                                                </div>
                                            </div>
                                        @else
                                            <em>No passengers available</em>
                                        @endif
                                    </div>
                                </div>    
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p style="text-align:center; color:black;">Made with <i class="fa fa-heart" style="color:red"></i> by MaG || Copyright &#169;2020</p>

    </div>

@stop