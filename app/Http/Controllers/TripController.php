<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\Trip;
use App\Train;
use App\Customer;
use App\Location;
use Session;
use Validator;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $trips = Trip::orderBy('id', 'asc')->paginate(30);
        $trips = Trip::orderBy('id', 'asc')->get();

         return view('trips.index')
         ->withTrips($trips);
         

        // $trips = DB::table('trips')->get();

        // return view('trips.index', ['trips' => $trips]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trains = Train::all();
        $locations = Location::all();

        return view('trips.create')
            ->withTrains($trains)->withLocations($locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // return $request;
        //validate the data
        $this->validate($request, array(
            'train_id'               => 'required|integer',
            'departurelocation_id'   => 'required|integer',
            'arrivallocation_id'     => 'required|integer',
            'departure_time'         => 'required|date_format:Y-m-d H:i',
            'arrival_time'           => 'required|date_format:Y-m-d H:i',
            'price'                  => 'required|numeric|between:0, 999.99',
        ));

        //store in the database
        $trip  = new Trip;

            $trip->train_id = $request->train_id;
            $trip->departurelocation_id = $request->departurelocation_id;
            $trip->departurelocation_id = $request->departurelocation_id;
            $trip->arrivallocation_id = $request->arrivallocation_id;
            $trip->departure_time = $request->departure_time;
            $trip->arrival_time = $request->arrival_time;
            $trip->price = $request->price;

        // save the image
        // if ($request->hasFile('featured_image')) {
        //     $image = $request->file('featured_image');
            
        //     $filename = time() . '.' . $image->getClientOriginalExtension();
        //     $location = public_path('image/' . $filename);
        //     Image::make($image)->resize(300, 100)->save($location);
            
        //     $trip->image = $filename;
        // }      
        
        $trip->save();

        Session::flash('success', 'Registration Successful');

        return redirect()->route('trips.index', $trip->id);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trips = Trip::find($id);

        return view('trips.show')
                ->withTrips($trips);
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
        //
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $trips = Trip::where('location', 'LIKE', '%'.$search_text. '%')
                    // ->orWhere('arrival', 'LIKE', '%'.$search_text. '%')
                    ->with('train')->get();

        return view('trips.search',compact('trips'))->withsearch_text($search_text);        
    }
}
