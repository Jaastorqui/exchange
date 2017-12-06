<?php

namespace App\Http\Controllers;

use Auth;

use App\Classes\StorageClass;
use App\User;
use App\Car;
use App\Travel;
use App\City;
use App\Passenger;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard. (GET)
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $user_id = Auth::user()->id;

        $profile = User::find($user_id);
        $profile->user = Auth::user();

        
        $cars = Car::find($profile->cars_id);

        $data['profile'] = $profile;
        return view ('home.dashboard')->with('data', $data);
    }

    /**
     * Show the application travels. (GET)
     *
     * @return \Illuminate\Http\Response
     */
    public function travel()
    {
        $user_id = Auth::user()->id;

        $passengers = Passenger::passengers($user_id);
        $travels = array();
        foreach ($passengers as $val) 
        {
            array_push($travels, $val->travel_id);
        };

        $travels = Travel::whereIn('id', $travels)->get();

        $data['travels'] = $travels;
        return view ('home.travels')->with('data', $data);
    }
    

    /**
     * Show the application dashboard. (PUT)
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardUpdate(Request $request)
    {
        $profile = User::find(Auth::user()->id);

        //$user->photo = 
        $profile->surname1 = $request->input('surname1');
        $profile->surname2 = $request->input('surname2');
        $profile->datebirthday = $request->input('datebirthday');
        $profile->city = $request->input('city');
        $profile->dni = $request->input('dni');

        $storageClass = new StorageClass($request->file('photo'), $profile, 'users');
        $profile = $storageClass->setPhoto();
        
        $profile->save();

        $profile->user = Auth::user();

        return $this->dashboard();
    }


    /**
     * Show the application account. (GET)
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        $user_id = Auth::user()->id;

        $profile = User::find($user_id);
        $profile->user = Auth::user();


        return view ('home.account')->with('data', $profile);
    }

    /**
     * Show the application account. (DELETER)
     *
     * @return \Illuminate\Http\Response
     */
    public function accountDelete()
    {
        $user = User::find(Auth::user()->id);    

        $cars = Car::find($user->cars_id);
        $cars->delete();

        $user->delete();
        Auth::logout();
        return redirect('/');
    }

    /**
     * Show the application cars. (GET)
     *
     * @return \Illuminate\Http\Response
     */
    public function car()
    {
        $profile = User::find( Auth::user()->id );
        $cars = Car::find($profile->cars_id);


        return view ('home.car')->with('data', $cars);
    }

    /**
     * Show the application cars. (GET)
     *
     * @return \Illuminate\Http\Response
     */
    public function carUpdate(Request $request)
    {
        $profile = User::find( Auth::user()->id );
        $cars = Car::find($profile->cars_id);

        if ( !$cars ) 
            $cars = new Car;
        
        $cars->brand = $request->input('brand');
        $cars->model = $request->input('model');
        $cars->seats = $request->input('seats');
        
        $storageClass = new StorageClass($request->file('photo'), $cars, 'cars');
        $cars = $storageClass->setPhoto();


        $cars->save();

        return view ('home.car')->with('data', $cars);
    }


    

}
