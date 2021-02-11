<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Customer;
use App\Location;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index')->withTickets($tickets);

        // return view('trips.search');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $locations = Location::all();   
        // $tickets = Ticket::all();
        return view('tickets.create')
        ->withLocations($locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     // validate the data
    //  $this->validate($request, array(
    //     'startStation_id' => 'required|string|max:191',
    //     'endStation_id'   => 'required|string|max:191', 
    //     'class'           => 'required|string|max:2',
    // ));

    //store in the database
    // $ticket = new Ticket;

    // $ticket->startStation_id = $request->startStation_id;
    // $ticket->endStation_id = $request->endStation_id;
    // $ticket->class = $request->class;  

    // $ticket->save();

    // // Session::flash('success', 'Your Ticket was successfully booked!');

    // return redirect()->route('trips.index', $ticket->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $trips = Trip::where('departure', 'LIKE', '%'.$search_text. '%')
                    // ->orWhere('arrival', 'LIKE', '%'.$search_text. '%')
                    ->with('train')->get();

        return view('trips.search',compact('trips'))->withsearch_text($search_text);        
    }
}
