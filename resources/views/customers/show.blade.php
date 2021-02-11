@extends('main')

@section('title', "| View Booking")


@section('content')
    <h2 class="P-2 text-write">SHOW <i class="fa fa-angle-double-right m-l-10 m-r-10"></i>{{$customer->name}}</h2>
    <hr>
    @include('partials._message')

    <div class="p-4">

        <div class="row">
            <div class="col-md-8">
  
                <div class="row">
                    <div class="col-md-4 m-b-20">
                        <span class="text-up text-primary">Amount Paid</span>
                        <p class="lead m-t-5 fs-20"><strong>{{$customer->age}}</strong></p>
                    </div> 
        
                    <div class="col-md-4 m-b-20">
                        <span class="text-up text-primary">GENDER</span> <br>
                        <span class="m-t-5 fs-13 text-up p-2 badge badge-{{$customer->gender == 'M' ? 'primary' : 'danger' }}">{{$customer->gender}} </span>
                    </div>

                   
                </div>

                
            </div>

            <div class="col-md-4 form-group">
                <div class="card">
                    <div class="card-body">
                        {{-- <dl class="dl-horizontal">
                            <label>Url:</label>
                            <p><a href="{{ url($customer->customer_id) }}">{{ url($customer->customer_id) }}</a></p>
                        </dl> --}}
                        {{-- <dl class="dl-horizontal">
                            <label>Generational Group:</label>
                            <p>{{ $customer->generational__group->name }}</p>
                        </dl> --}}
                        <div class="row m-b-10">
                            <div class="col-md-6 ">
                                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-block btn-animated box-shadow">UPDATE</a>
                            </div>
                            <div class="col-md-6">
                                {!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 card-footer text-muted">
                                {{ Html::linkRoute('customers.index', '<< See All customers', [], ['class' => 'btn btn-success btn-block'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
    
@endsection
