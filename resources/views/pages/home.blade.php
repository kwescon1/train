@extends('main')
@section('title', 'Home - ')

@push('css')
    {{ Html::style('css/home.css') }}
@endpush

@section('content')
    <div class="container">
        <div class="row py-2">
            <div class="col-md-6">
                <h4>NUPS-G KNUST MEMBER DATABASE</h4>
            </div>
            <div class="col-md-6 text-right">
                <a class="text-light" href="{{ route('logout') }}"
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
        <div class="box-shadow px-5 py-3 m-t-30 bg-white">
            <div class="row m-t-50">
                <div class="col text-center">
                    <h3 class="">Menu</h3><hr>
                </div>
            </div>
            <div class="buttons">
                <div class="row mx-5">
                    <div class="col-md-4 text-center">
                        <a class="register-button" href="#"><i class="fa fa-user"></i></a>
                        <div class="m-t-15 m-b-50">
                            <h6 class="text-primary">
                                Register New Member
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <a class="send-bulk-message-button" href=""><i class="fa fa-bullhorn"></i></a>
                        <div class="m-t-15 m-b-50">
                            <h6 class="text-success">
                                Send Bulk Message
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <a class="dashboard-button" href="{{ route('dashboard') }}"><i class="fa fa-laptop"></i></a>
                        <div class="m-t-15 m-b-50">
                            <h6 class="text-warning">
                                Go to Dashboard
                            </h6>
                        </div>
                    </div>
                </div>
            </div> <hr>
            <div class="row text-center m-t-40 px-md-5">
                <div class="col-md-6">
                    {{ Form::open() }}
                        <div class="form-group">
                            <h5 class="text-primary">Search Members</h5>
                            {{ Form::text('query', null, ['class' => 'form-control text-up', 'required', 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Search Member', ['class' => 'btn btn-outline-primary', 'name' => 'search_member', 'value' => 'search_member'])}}
                        </div>
                    {{ Form::close() }}
                </div>
               
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush