<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Travel;
use App\Classes\Travels;
use App\User;
use App\Car;
use App\Passenger;
use Carbon\Carbon;

class Search extends Controller
{
    //
    public function index(Request $request) 
    {
        

        if ($request->input('day')) 
        {
            $day = $request->input('day');
            $cityDeparture = $request->input('cityDeparture');
            $cityArrived = $request->input('cityArrived');
        } 
        else 
        {
            return back()->withInput();
        }
        $where = new \stdclass;
        $where->day= $day; 
        $where->cityDeparture =  $cityDeparture;
        $where->cityArrived = $cityArrived;

        session(['day' => $day,'cityDeparture' => $cityDeparture,'cityArrived' => $cityArrived]);
         
        return view('search')->with('data', $where);
    }


    public function getTravels (Request $request) {
        
        $where = new \stdclass;
        $day = session('day');
        $cityDeparture = session('cityDeparture');
        $cityArrived = session('cityArrived');
        $where = ["cityDeparture" => $cityDeparture , "cityArrived" => $cityArrived];

        // Get info travel + user + cars..
        $travels = Travel::where($where)->where('day', 'LIKE', "%$day%")->get();
        


        $arrayTravels = array();
        foreach ($travels as $travel) {

            $profile = User::find($travel->driver_id);
            if (!isset($profile))
                return Response()->json("no se ha poidido encontrar usuario");

            $cars = Car::find($profile->cars_id);

            $objTravel = new Travels($travel->day, $travel->cityDeparture, 
            $travel->cityArrived, $travel->price, $profile->name);

            $objTravel->day = Carbon::parse($objTravel->day)->format('H-i');

            /* Calculo de plazas disponibles */
            $objPassenger = $cars->seats - Passenger::where(["travel_id" => $travel->id])->count();
            $objTravel->squares = $objPassenger;

            
            array_push($arrayTravels, $objTravel->getTravel());
        }

        
        return Response()->json($arrayTravels);
    }

    /* MEthod for know */
    public function getAunthentication (Request $request) {
        if (Auth::user()->id)
            return Response()->json(["response" => true]);
        else
            return Response()->json(["response" => false]);
    }
}
