<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DonacionController extends Controller
{
    public function index(){
        return view('donator');
    }

    public function donate(Request $request){
        return $request;
    }
}
