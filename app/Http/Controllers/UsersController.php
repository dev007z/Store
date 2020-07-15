<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\locations;

class UsersController extends Controller
{
    //create function to CALL USERS VIEW
    public function index(){
        return view('users.user');
    }

    public function fetch(Request $request){
        if ($request->get('nigerianStates')) {
            $query = $request->get('nigerianStates');
            $data = DB::table('locations')
                    ->where('State_name', 'like', '%' . $query . '%')
                    ->get();
            $output = '<ul style="display: block !important; " class="dropdown-menu">';
            if ($data->count()>0) {
                foreach ($data as $row) {
                    $output .= '<li class="dropdown-item-text">' .$row->State_name. '</li>';
                }
                $output .= '</ul>';
                echo $output;
            }
            else {
                $output .= '<li class="dropdown-item-text">Record not found!</li></ul>';
                echo $output;
            }
        }
    }
}
