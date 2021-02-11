<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Train;
use App\Ticket;
use App\Trip;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $customers = Customer::all();
        $trips = Trip::all();
        return view('customers.index')
        ->withTrips($trips)->withCustomers($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trains = Train::all();
        $trips = Trip::all();

        return view('customers.create')
        ->withTrains($trains)
        ->withTrips($trips);
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
        $this->validate($request, array(
            'name'            => 'required|string|max:191',
            'gender'          => 'required|alpha|max:1', 
            'age'             => 'required|string|max:2',
            'phone'           => 'required|string|max:191',
            'paid_account'    => 'required|string|max:191',
            'paid_type'       => 'required|string|max:191',
        ));

        //store in the database
        $customer = new Customer;

        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->age = $request->age;  
        $customer->phone = $request->phone;
        $customer->paid_account = $request->paid_account;
        $customer->paid_type = $request->paid_type;


        $customer->save();

        Session::flash('success', 'Your Ticket was successfully booked!');

        return redirect()->route('customers.show', $customer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customers.show')->withCustomer($customer);
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
}
