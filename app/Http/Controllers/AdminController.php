<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function getStats(){
        $countYouth = User::where("age","<=",18)->count();
        $countAdult = User::where("age",">",18)->where("age","<",60)->count();
        $countOld = User::where("age",">",60)->count();
        $male = User::where("gender","male")->count();
        $female = User::where("gender","female")->count();
        $countAll=User::all()->count();
        $stats=[
            "youth"=>$countYouth/$countAll *100,
            "adult"=>$countAdult/$countAll *100,
            "old"=>$countOld/$countAll *100,
            "male"=>$male/$countAll *100,
            "female"=>$female/$countAll *100,
        ];
        return response()->json($stats, 200);

    }
}
