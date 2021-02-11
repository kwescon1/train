@extends('main')

@section('title', "| View Booking")



@section('content')

    <h2 class="p-2 text-write">EDIT <i class="fa fa-angle-double-right m-l-10 m-r-10"></i>{{$customer->name}}</h2>
    <hr>
    @include('partials._message')

    <div class="p-4">

        {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'PUT']) !!}

            <div class="row">
                <div class="col-md-8">
    
                    <div class="row">
                        <div class="col-md-4 m-b-20">
                            {{ Form::label('paid_account', 'Amount Paid') }}
                            {{ Form::text('paid_account', null, array('class' => 'form-control')) }}                            
                        </div> 
            
                        <div class="form-group col-md-4">   
                            {{ Form::label('gender', 'Gender:')}}
                            <div>
                                {{ Form::radio('gender', 'M', true)}} Male
                                {{ Form::radio('gender', 'F', null, ['class' => 'm-l-10'])}} Female
                            </div>
                        </div>
                   
                    </div> 

                    <div class="row">
                        <div class="col-md-4 m-b-20">
                            {{ Form::label('age', 'Age') }}
                            {{ Form::text('age', null, array('class' => 'form-control')) }}                            
                        </div>

                        <div class="col-md-4 m-b-20">
                            {{ Form::label('paid_type', 'Paid Type') }}
                            {{ Form::text('paid_type', null, array('class' => 'form-control')) }}                            
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
                                    <a href="{{ route('customers.show', 'Cancel', $customer->id) }}" class="btn btn-danger btn-block btn-animated box-shadow">Cancel</a>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::open(['route' => ['customers.update', $customer->id], 'method' => 'DELETE']) !!}
                                    {!! Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) !!}
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
        {!! Form::close() !!}

    </div>
    
@endsection
 