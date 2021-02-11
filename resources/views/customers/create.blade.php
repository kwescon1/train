@extends ('main')

@section('title', ' Passenger Details - ')

@section('stylesheets')
    {!! Html::style('/assets/css/parsley.css') !!}
@endsection

@section('content')    
        <div class="container">
            @include('partials._message')
                
            <div class="row bg-white p-5 mt-3">
                <div class="col-12">

                    <div class="row bg-blue">
                        <div class="form-group col-12">
                            <h3 class="head"> BOOK YOUR TICKET  </h3>  
                        </div>

                        {{-- <div class="col">                            
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-condensed table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Train</th>
                                            <th scope="col">Train No</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($trains as $train)
                                            <tr>
                                                <td>{{ $train->name }}</td>
                                                <td>{{ $train->number }}</td>
                                            </tr>                               
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}

                    <hr>  

                    {!! Form::open(array('route' => 'customers.store')) !!}
                        <div class="card border-primary">
                            <div class="card-header bg-primary text-white" style="text-align:center"> Passenger Details</div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-4">
                                            {{ Form::label('name', 'Name') }}
                                            {{ Form::text('name', null, array('class' => 'form-control text-up','required', 'data-parsley-maxlength' => '191', 'data-parsley-pattern' => "/^[a-zA-Z -\s]+$/", 'placeholder' => 'FULL NAME', 'autocomplete' => 'off')) }}
                                        </div>

                                        <div class="form-group col-md-4">   
                                            {{ Form::label('gender', 'Gender')}}
                                                <div>
                                                    {{ Form::radio('gender', 'M', true)}} Male
                                                    {{ Form::radio('gender', 'F', null, ['class' => 'm-l-10'])}} Female
                                                </div>
                                        </div> 
                                    
                                        <div class="form-group col-md-4">    
                                            {{ Form::label('age', 'Age') }}
                                            {{ Form::text('age', null, array('class' => 'form-control text-up', 'required', 'data-parsley-maxlength' => '2', 'placeholder' => 'AGE', 'autocomplete' => 'off', 'data-parsley-type' => 'number')) }}
                                        </div>

                                        <div class="form-group col-md-4">   
                                            {{ Form::label('phone', 'Contact') }}
                                            {{ Form::text('phone', null, array('class' => 'form-control text-up', 'required', 'data-parsley-minlength' => '10', 'data-parsley-maxlength' => '10', 'placeholder' => '0280000000', 'autocomplete' => 'off', 'data-parsley-type' => 'number')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('paid_account', 'Paid Account') }}
                                            {{ Form::text('paid_account', null, array('class' => 'form-control text-up', 'data-parsley-maxlength' => '191', 'data-parsley-pattern' => "/^[a-zA-Z -\s]+$/", 'placeholder' => 'PAID ACCOUNT', 'autocomplete' => 'off')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('paid_type', 'Paid Type') }}
                                            {{ Form::text('paid_type', null, array('class' => 'form-control text-up', 'data-parsley-maxlength' => '191', 'data-parsley-pattern' => "/^[a-zA-Z -\s]+$/", 'placeholder' => 'PAID TYPE', 'autocomplete' => 'off')) }}
                                        </div>                                                          
                                    </div>

                                    <div class="row text-center">
                                        <div class="form-group col-md-6 m-t-30">
                                            {{ Form::submit('Book Ticket', array('class' => 'btn btn-primary btn-lg btn-block btn-animated box-shadow')) }}
                                        </div>
                                        <div class="form-group col-md-6 m-t-30">
                                            <a href="" class="btn btn-danger btn-lg btn-block btn-animated-reverse box-shadow"> Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div> 
                    {!! Form::close() !!}
                </div>    
            </div>                    
                       
            

                <p style="text-align:center; color:black;">Made with <i class="fa fa-heart" style="color:red"></i> by MaG || Copyright &#169;2020</p>
        </div>
@endsection


@section('scripts')
    {{ Html::script('/assets/js/parsley.min.js') }}
@endsection





