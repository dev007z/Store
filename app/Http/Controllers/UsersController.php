<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\locations;
use App\MainCategory;

class UsersController extends Controller
{
    //create function to CALL USERS VIEW
    public function index(){
        $categories = DB::table('main_categories')
                    ->select('main_categories.id', 'main_categories.main_category', 'icons.icons')
                    ->join('icons', 'icons.id', '=', 'main_categories.id')
                    ->get();
        return view('users.user', ['categories'=>$categories]);
    }

    public function fetch(Request $request){
        // get the states from database and return to ajax in app.blade.php
        if ($request->get('nigerianStates')) {
            $query = $request->get('nigerianStates');
            $data = DB::table('locations')
                    ->where('State_name', 'like', '%' . $query . '%')
                    ->orderby('State_name')
                    ->get();
            $output = '<ul style="display: block !important; " class="dropdown-menu">';
            if ($data->count()>0) {
                foreach ($data as $row) {
                    $output .= '<li class="dropdown-item-text searchState" id="search" style="cursor: pointer;" name="searchState" value='.$row->id. '>' .$row->State_name. '</li>';
                }
                $output .= '</ul>';
                echo $output;
            }
            else {
                $output .= '<li class="dropdown-item-text">Location not found!</li></ul>';
                echo $output;
            }
        }
    }

    public function cities(Request $request){
        if ($request->get('id')) {
            $query = $request->get('id');
            $data = DB::table('cities')
                ->where('state_id', '=', $query)
                ->orderby('city_name')
                ->get();
            $output = '<ul style="display: block !important; " class="dropdown-menu">';
            if ($data->count() > 0) {
                foreach ($data as $row) {
                    $output .= '<li class="dropdown-item-text" id="searchCity" style="cursor: pointer;" name="searchCity">' .$row->city_name . '</li>';
                }
                $output .= '';
                echo $output;
            } else {
                $output .= '<li class="dropdown-item-text">Location not found!</li></ul>';
                echo $output;
            }
        }
    }

    public function mainCategories(Request $request){
        $data = DB::table('main_categories')->get();
        $output = '';
        if ($data->count() > 0) {
            foreach ($data as $row) {
                $output .= '<option value=' . $row->id . '>' . $row->main_category . '</option>';
            }
            $output .= '';
            echo $output;
        }
    }

    public function addProduct(){
        $categories = DB::table('main_categories')
                    ->select('main_categories.id', 'main_categories.main_category', 'icons.icons')
                    ->join('icons', 'icons.id', '=', 'main_categories.id')
                    ->get();
        return view('users.addProduct', ['categories'=>$categories]);
    }

    public function viewProducts(Request $request, $main_category, $id){
        $categories = DB::table('main_categories')
                    ->select('main_categories.id', 'main_categories.main_category', 'icons.icons')
                    ->join('icons', 'icons.id', '=', 'main_categories.id')
                    ->get();
        switch ($id) {
            case '1':
                # code...
                echo "All categories";
                break;
            case '2':
                # code...
                return view('users.postProduct.vehicles', ['categories'=>$categories]);
                break;
            case '3':
                # code...
                return view('users.postProduct.phones-tablets', ['categories'=>$categories]);
                break;
            case '4':
                # code...
                return view('users.postProduct.electronics', ['categories'=>$categories]);
                break;
            case '5':
                # code...
                return view('users.postProduct.real-estate', ['categories'=>$categories]);
                break;
            case '6':
                # code...
                return view('users.postProduct.services', ['categories'=>$categories]);
                break;

            default:
                # code...
                return view('welcome');
                break;
        }
    }

    public function subCategories(Request $request){
        if ($request->get('id')) {
            $query = $request->get('id');
            $data = DB::table('sub_categoies')
                ->where('mainCategory_id', '=', $query)
                ->orderby('sub_category')
                ->get();
            $output = '';
            if ($data->count() > 0) {
                foreach ($data as $row) {
                    $output .= '<option>' . $row->sub_category . '</option>';
                }
                $output .= '';
                echo $output;
            }
            else{
                echo "<option>No Record Found</option>";
            }
        }
        else {
            echo "<option>No Record Found</option>";
        }
    }
}
