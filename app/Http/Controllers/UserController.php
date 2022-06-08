<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $users = User::where("admin",0)->get();

        if (empty($users)) {
            return response()->json(['message' => 'No user found'], 404);
        } else {
            return response()->json($users, 200);
        }
    }

    public function getMyDetails(Request $request){
        return  response()->json($request->user(), 200);
    }

    public function updateImage(Request $request){
        $user = User::find($request->user()->id);
        $user->avatar =$request->input("avatar");
        $user->save();
        return response()->json("User updated",200);
    }

}
