<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    // this method will show user registration
    public function registration(){

        return view('front.Account.registration');

    }
    //save user details
    public function processregistration(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'Password'=>'required|min:5|same:Confirm_Password',
            'Confirm_Password'=>'required',
            
        ]);
        if($validator->passes()){
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->Password=Hash::make($request->Password);
            // $user->Confirm_Password=$request->Confirm_Password;
            $user->save();
            Session()->flash('success','you have registered suessfully');
            return response()->json([
                'status'=>true,
            'errors'=>[]
            ]);
        }else{
            return response()->json([
                'status'=>false,
            'errors'=>$validator->errors()
            ]);
        }

        return view('front.Account.registration');

    }

    // this method will show user login
    public function login(){
        return view('front.Account.login');
    }
}
