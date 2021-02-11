@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Success:</strong> {{ Session::get('success') }}
    </div>    
@endif

@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        <strong>Sorry:</strong> {{ Session::get('error') }}
    </div>    
@endif


@if ($errors->any())
    <div class="alert alert-danger" role="alert">
       <strong>Error{{ $errors->count() > 1 ? 's' : '' }}</strong>
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
    </div>
@endif
