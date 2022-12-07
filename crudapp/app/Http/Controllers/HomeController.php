<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class HomeController extends Controller
{
    public function index(Request $request){
        $departments = Department::all();
        return view('home', compact('departments'));
    }
}
