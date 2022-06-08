<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function getStats(Request $request){
        $countYouth = User::where("age","<=",18)->count();
        $countAdult = User::where("age",">",18)->where("age","<",60)->count();
        $countOld = User::where("age",">",60)->count();
        $stats=[
            "youth"=>$countYouth,
            "adult"=>$countAdult,
            "old"=>$countOld
        ];
        return response()->json($stats, 200);

    }
}
