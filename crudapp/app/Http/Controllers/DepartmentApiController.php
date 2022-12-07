<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Resources\DepartmentResource;

class DepartmentApiController extends Controller
{
    public function display_departments(){
       // $departments = Department::all();

        //return DepartmentResource::collection($departments);
    }

    public function department_details($id){

    }
}
