<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\User;
use App\Car;
use App\Travel;
use Illuminate\Http\Request;


class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $profile = User::find($user_id);
        $profile->user = Auth::user();

        $travels = Travel::travels($user_id);
        $cars = Car::find($profile->cars_id);

        $data['profile'] = $profile;
        $data['travels'] = $travels;
        $data['cars'] = $cars;
        return view ('logged')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ( $user->cars_id ) {
            $car = Car::find($user->cars_id) ;
        } else {
            $car = new Car;
        }


        
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->seats = $request->input('seats');

        $photo = null;
        if ( $request->file('photo') ) {
            $file = $request->file('photo');

            // If user has photo uploaded, first delete this photo
            if ( $car->photo ) {
                Storage::delete( $car->photo );
            }

            $photo = time() . '_' . $file->getClientOriginalName();
            Storage::disk('image')->put($photo, file_get_contents( $file->getRealPath() ) );
        }


        $car->photo = $photo;
        $id = $car->save();

        $user->cars_id = $car->id;
        $user->save();
        return $this->index();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return User::find($user)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = new User;
        $profile->id = Auth::user()->id;
        $profile = $this->show($profile);

        //$user->photo = 
        $profile->surname1 = $request->input('surname1');
        $profile->surname2 = $request->input('surname2');
        $profile->datebirthday = $request->input('datebirthday');
        $profile->city = $request->input('city');
        $profile->dni = $request->input('dni');

        $photo = null;
        if ( $request->file('photo') ) {
            $file = $request->file('photo');

            // If user has photo uploaded, first delete this photo
            if ( $profile->photo ) {
                Storage::delete( $profile->photo );
            }

            $photo = time() . '_' . $file->getClientOriginalName();
            Storage::disk('image')->put($photo, file_get_contents( $file->getRealPath() ) );
        }

        $profile->photo = $photo;
        $profile->save();

        $profile->user = Auth::user();

        return view('logged')->with('data', $profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);    
        $user->delete();
        Auth::logout();
        return redirect('/');
    }
}
