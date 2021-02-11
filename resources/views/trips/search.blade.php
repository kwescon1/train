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
    
@push('scripts')
    
    <script>
    /**
    * Listens to when the edit button is clicked.
    * Makes an ajax call to get the trip model belonging to that id
    * Populates the edit modal input fields with the returned model attributes 
    */
        $('.editBtn').click(function(e) {
            e.preventDefault();
            $('.alert-danger').hide();
            var id = $(this).data('id');
            $.get("{{route('trips.index')}}", {id:id}, function(data){
                $('#form-update').find('#id').val(data.id)
                $('#form-update').find('#name').val(data.name)        
                $('#editModal').modal('show');
            });
        })

    /**
    * Listens to when the edit form is being submitted
    * Sumbits the form using ajax and refreshes the window
    */
        $('#form-update').on('submit', function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            var url = $(this).attr('action');

            $.ajax({
                data:data,
                url :url,
                method: 'POST',
                success: function(data) {
                    if (data.errors) {
                        $.each(data.errors, function(key, value){
                                $('.modal-errors').html('<li>'+value+'</li>');
                        });
                        $('.alert-danger').show();
                    } else {
                        window.location.href = "{{route('trips.index')}}";  
                    }
                },
                error: function() {
                    alert('Error updating fields');
                }
            });
        });

    /**
    * Listens to when the .removeBtn is clicked
    * Gets it's data-id and passes it to #modalConfirmBtn as value
    * Gets it's data-name and passes it to .what-to-remove  as html 
    */
        $('.removeBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            
            $('#modalConfirmBtn').val(id);
            $('.what-to-remove').html(name);
            $('#delete-text-field').val("");
            $('#deleteModal').modal('show');          
        })

    /**
    * Listens to when #delete-text-field changes.
    * If #delete-text-field == .what-to-remove html, enable the confirm btn.
    */
        $('#delete-text-field').keyup(function() {
            var confirmText = $('#delete-text-field').val();
            var whatToRemove = $('.what-to-remove').html();
            $('#modalConfirmBtn').addClass('btn-light').removeClass('btn-danger');
            $('#modalConfirmBtn').attr('disabled', true);
            if (confirmText === whatToRemove) {
                $('#modalConfirmBtn').addClass('btn-danger').removeClass('btn-light');
                $('#modalConfirmBtn').removeAttr('disabled');
            }
        });
    
    /**
    * Listens to when the #modalConfirmBtn is clicked
    * Submits the model id to be deleted
    */
        $('#modalConfirmBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('value');
            $.get("{{route('trips.index')}}", {id:id}, function(){
                window.location.href = "{{route('trips.index')}}"; 
            })
        })
    </script>
@endpush

@endsection