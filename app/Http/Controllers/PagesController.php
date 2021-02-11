<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Trip;

class PagesController extends Controller
{
    public function getWelcome() {
        return view ('pages.welcome');
    }
    
    public function getAbout() {
        return view ('pages.about');
    }

    public function getContact() {
        return view ('pages.contact');
    }

    public function getHome() {
        return view ('pages.home');
    }

    public function getBook() {
        $locations = Location::all();
        
        return view('pages.book')
                ->withLocations($locations);
    }

    public function search(Request $request){
        $availableTrips = Trip::where('departurelocation_id', $request->startStation_id)->where('arrivallocation_id', $request->endStation_id)->get();

        return view('book.index')->withAvailableTrips($availableTrips);
    }
}
