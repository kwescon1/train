@extends('main')

@section('title', ' Search location - ')

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
                <div class="form-group col-4">
                    <h1 class="head">LOCATIONS</h1> <hr> 
                </div>
                <div class="col-md-8">
                {{ Form::open(['route' => 'locations.store', 'class' => 'form-inline justify-content-end'])}}
                    <div class="form-group">
                        {{ Form::text('name', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Add a new location'])}}
                    </div>
                    <div class="form-group m-l-3">
                        {{ Form::submit('Add', ['class' => 'btn btn-info btn-sm'])}}
                    </div>
                {{ Form::close() }}
        </div>
            </div>

            <div class="row m-t-50">
                    @if ($locations->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-condensed table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" colspan="3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($locations as $location)
                                        <tr>
                                            <th scope="row">{{ $location->id }}</th>
                                            <td>{{ $location->name}}</td>
                                            <td>
                                                <a href="{{ route('customers.create', $location->id) }}" class="btn btn-secondary btn-sm editBtn" data-id="{{$location->id}}">Book</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('locations.show', $location->id) }}" class="btn btn-info btn-sm">View</a>
                                            </td>
                                            <td>
                                                {{-- <a href="" class="btn btn-danger btn-sm {{ count($location->members) > 0 ? 'disabled' : ''}} removeBtn" data-id="{{$location->id}}" data-name="{{$location->name}}">Remove</a> --}}
                                            </td>
                                        </tr>                               
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mx-auto m-t-50">
                            {{-- {{ $locations->links() }} --}}
                        </div>
                    @else
                        <em>No locations available</em>
                    @endif
            </div>
        </div>        
    </div> 

    edit modal
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- @include('partials._modal_message') --}}
                {{-- {{ Form::open(['route' => 'locations.update', 'id' => 'form-update'])}} --}}
                    <div class="form-group">
                        {{ Form::hidden('id', null, ['id' => 'id'])}}
                    </div>
                    <div class="form-group">
                        {{ Form::text('name', null, ['class' => 'form-control form-control-sm', 'id' => 'name'])}}
                    </div>
                    <div class="form-group text-center">
                        {{ Form::submit('Submit', ['class' => 'btn btn-info btn-sm m-l-20'])}}
                    </div>
                {{-- {{ Form::close() }} --}}
            </div>
            </div>
        </div>
    </div>

    {{-- delete modal --}}
    {{-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="deleteModalLabel">Confirmation Required</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-danger fs-14">
                        You are going to remove <span class="what-to-remove"></span>. 
                        Removed locations CANNOT be restored! Are you ABSOLUTELY sure?
                    </div>
                    <div class="text-monospace fs-12 m-t-20">
                        This action will delete all members associated with this location
                    </div>
                    <div class="text-monospace fs-12">
                        Please type <span class="delete-text what-to-remove text-danger"></span> to proceed or close this modal to cancel
                    </div>
                    <div class="form-group">
                        {{ Form::text('what-to-remove', null, ['class' => 'form-control form-control-sm m-t-20', 'id' => 'delete-text-field'])}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-sm m-l-20" disabled id="modalConfirmBtn">Confirm</button>
                </div>
            </div>
        </div>
    </div> --}}

@push('scripts')
    
    <script>
    /**
    * Listens to when the edit button is clicked.
    * Makes an ajax call to get the location model belonging to that id
    * Populates the edit modal input fields with the returned model attributes 
    */
        $('.editBtn').click(function(e) {
            e.preventDefault();
            $('.alert-danger').hide();
            var id = $(this).data('id');
            $.get("{{route('locations.index')}}", {id:id}, function(data){
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
                        window.location.href = "{{route('locations.index')}}";  
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
            $.get("{{route('locations.index')}}", {id:id}, function(){
                window.location.href = "{{route('locations.index')}}"; 
            })
        })
    </script>
@endpush

@endsection