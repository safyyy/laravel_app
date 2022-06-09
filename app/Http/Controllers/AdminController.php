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
            "youth"=>round($countYouth/$countAll *100,0,PHP_ROUND_HALF_UP),
            "adult"=>round($countAdult/$countAll *100,0,PHP_ROUND_HALF_UP),
            "old"=>round($countOld/$countAll *100,0,PHP_ROUND_HALF_UP),
            "male"=>round($male/$countAll *100,0,PHP_ROUND_HALF_UP),
            "female"=>round($female/$countAll *100,0,PHP_ROUND_HALF_UP),
        ];
        return response()->json($stats, 200);

    }
}
