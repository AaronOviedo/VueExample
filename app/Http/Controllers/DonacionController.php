<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Hash;

class DonacionController extends Controller
{
    public function index(){
        return view('donator');
    }

    public function register(Request $request){
        // return $request;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'rol_id' => 2,
        ]);
        return [
            'message' => 'Donator created succesfully',
            'code' => 201
        ];
    }

    public function donate(Request $request){
        return $request;
    }

    public function getDonators(Request $request){
        $users = User::where('rol_id', 2)->get();
        if($users != null)
            return [
                'message' => 'Information retrieved succesfully',
                'code' => 200,
                'data' => $users,
            ];
        else
            return [
                'message' => 'Not information where found',
                'code' => 404
            ];
    }

    public function getBenefactors(Request $request){
        $users = User::where('rol_id', 1)->get();
        if($users != null)
            return [
                'message' => 'Information retrieved successfully',
                'code' => 200,
                'data' => $users,
            ];
        else
            return [
                'message' => 'Not information where found',
                'code' => 404
            ];
    }
}
