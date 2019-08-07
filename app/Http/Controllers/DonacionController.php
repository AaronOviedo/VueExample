<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Donacion;
use Illuminate\Support\Facades\Auth;

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
        // return $request;
        Donacion::create([
            'benefactor_id' => $request->benefactor,
            'donator_id' => $request->donator,
            'sum' => $request->sum
        ]);
        return [
            'message' => 'Donation created succesfully',
            'code' => 201
        ];
    }

    public function getDonators(){
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

    public function getBenefactors(){
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

    public function myDonations(){
        $user_id = Auth::id();
        $donaciones = Donacion::where('benefactor_id', $user_id)->get();

        $newDonations = array();

        foreach ($donaciones as $donacion) {
            $donator = User::find($donacion->donator_id);
            $donator_name = $donator->name;
            $tempArray = array(
                'nombre' => $donator_name,
                'monto' => $donacion->sum,
                'created_at' => $donacion->created_at
            );

            array_push($newDonations, $tempArray);
        }

        return [
            'message' => 'Donations retrieved succesfully',
            'data' => $newDonations,
            'code' => 200
        ];
    }

    public function myDonationsPage(){
        return view('donaciones');
    }
}
