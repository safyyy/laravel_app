<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $req )
    {
        //validate
        $rules=[
            'name'=>'required|string',
            'cin'=>'string|unique:users',
            'email'=>'required|string|unique:users',
            'password'=> 'required|string|min:8'

        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        //create new user
        $user = User::create([
            'name'=>$req->name,
            'cin'=>$req->cin,
            'age'=>$req->age,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
            'avatar'=>$req->avatar,
            'gender'=>$req->gender
        ]);
        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $response= ['user'=> $user, 'token'=>$token];
        return response()->json($response, 200);

    }
    public function login(Request $req)
    //validate
    {
        $rules = [
            'email'=>'required',
            'password'=>'required|string'
        ];
          $req->validate($rules);
        //find user email in user table
        $user = User::where('email',$req->email)->first();
        //if user email found and pw is correct
        if($user && Hash::check($req->password, $user->password)){
            $token = $user->createToken('Personal Access token')->plainTextToken;
            $response=['user'=>$user, 'token'=>$token];
            return response()->json($response, 200);
        }
        $response = ['message'=>'Incorrect email or password' ];
        return response()->json($response, 400);
    }

}
?>
