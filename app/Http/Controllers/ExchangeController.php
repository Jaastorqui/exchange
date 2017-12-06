<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Code;
use App\Price;

class ExchangeController extends Controller
{
    //

    public function index ()
    {


    	$codes = Code::select("codes.name as base", "b.price as price", "c.name as destiny")
    		->join("prices as b", "codes.id", "b.origin")
    		->join("codes as c", "b.destiny", "c.id")
    		->get();
    	return Response()->json($codes);

    }
}