<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //create function to CALL USERS VIEW
    public function index(){
        return view('users.user');
    }
}
