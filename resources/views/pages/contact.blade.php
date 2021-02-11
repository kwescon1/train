@extends('main')

    @section('title', ' Contact - ')


@section('content')
    <div class="vertical-center" >
        @include('partials._nav')

        <div class="row mt-1 p-5 bg-white mx-auto">   

            <div class="col-8">
                <h3>CONTACT US</h3> <hr>
                <hr>
                <form action="">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Subject:</label>
                        <input id="subject" name="subject" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea name="message" id="message" class="form-control">Type your message here....</textarea>
                    </div>

                    <input type="submit" value="Send Message" class="btn btn-success">
                </form>
            </div>

            <div class="col-4">
                <h3>WHERE TO FIND US</h3> <hr>
                <p>Add map here<p>
            </div>

        </div> 
    </div>        

@endsection

