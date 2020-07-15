<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //create function to CALL USERS VIEW
    public function index(){
        return view('users.user');
    }
-
    public function fetch(Request $request){
        if ($request->get('nigerianStates')) {
            $query = $request->get('nigerianStates');
            $data = DB::table('states')
                    ->where('stateName', 'like', '%' . $query . '%')
                    ->get();
        }
    }
}
