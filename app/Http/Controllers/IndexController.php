<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class IndexController extends Controller
{

    /**
    * GetCitys from MongoDB
    */
    public function main() 
    {
        $data['city'] = City::get();;
        return view('home')->with('data', $data);
    }
}
