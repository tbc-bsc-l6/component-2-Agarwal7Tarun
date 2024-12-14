<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    //This method will show user registration page
    public function registration(){
        return view('front.account.registration');
    }

    //This method will save user
    public function processRegistration(Request $request){
        $validator = Validator::make($request->all(),[
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|mix:6|same:confirm_password',
        'confirm_password' => 'required',
        ]);
        if ($validator->passes()){
            return response()->json([
                'status'=> true,
                'errors'=>[]
            ]);

        }else{
            return response()->json([
                'status'=> false,
                'errors'=>$validator->errors()
            ]);
        }
    }
    //This method will show user login page
    public function login(){

    }
}
