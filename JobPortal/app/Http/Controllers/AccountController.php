<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    // this method will show user registration
    public function registration(){

        return view('front.account.registration');

    }
    //save user details
    public function processregistration(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email' => 'required|email|unique:users,email',
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

        return view('front.account.registration');

    }

    // this method will show user login
    public function login(Request $request){
        
        return view('front.account.login');
    }
    public function authenticate(Request $request){
        $validator=validator::make($request->all(),[
            'email' => 'required|email',
            'Password'=>'required',
            
        ]);
        if($validator->passes()){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->Password])){
                return redirect()->route('account.profile');

            }else{
                return redirect('account/login')->with('error','Either email or password is incorrrect');
            }

        }else{
            return redirect()->route('account.login')->withErrors($validator)->withInput($request->only('email'));

        }
    }
    public function profile(){
        $id=Auth::user()->id;
        // dd($id);
        $user=User::where('id',$id)->first();
        // dd($user);
        return view('front.account.profile',['user'=>$user]);
    }
    public function updateprofile(Request $request){
        $id = Auth::user()->id;
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5|max:25',
            'email' => 'required|email|unique:users,email,'.$id.',id'
            // Add other validation rules for designation, mobile, etc., if needed
        ]);
    
        if($validator->passes()){
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->designation = $request->designation;
            $user->mobile = $request->mobile;
            $user->save();
            Session()->flash('success','Record updated suessfully');
    
            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    

    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
        
    }
     
}
