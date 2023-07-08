<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAuthenticationController extends Controller
{
    //
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if($validator->fails()){
            return response(['error'=> $validator->errors()->all()],422);
        }

        $password_hash = Hash::make($request->password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$password_hash
        ]);

        $token = $user->createToken('LaravelTokenPassword')->accessToken;

        $response = ['token' => $token, 'message' => 'User Successfully created!'];

        return $response;

    }

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if($validator->fails()){
            return response(['error'=> $validator->errors()->all()],422);
        }
        
        //check user in user table
        $user = User::where('email',$request->email)->first();

        //if exist
        if($user){
            //check hash password
            $check_password = Hash::check($request->password, $user->password);
            
            //if same password
            if($check_password){
                $token = $user->createToken('LaravelTokenPassword')->accessToken;
                $response = ['token' => $token, 'message' => 'Successfully logged in!', 'user' => $user];
                
                return $response;
            }else{
                return response(['error'=>'Password is invalid!'],422);
            }

        }else{
            return response(['error'=>'Email does not exist!'],422);
        }

    }

    public function logout(Request $request){
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message'=> 'User successfully logged out!'];
        return $response;
    }
}
