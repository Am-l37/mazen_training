<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Departmentrole;
use App\Models\Rolepermission;
use App\Models\Userrole;
use App\Models\Permission;


class DepartmentController extends Controller
{
    public function display_departments(Request $request){
        $departments = Department::all();
        return view('display_departments', compact('departments'));
    }

    public function create_department(){
        return view('create_department');
    }
    public function store_department(Request $request){
       // $input = $request->all();
        //Department::create($input);

            $department = new Department;
            $department->name = $request->name;
            $department->description = $request->description;
            $department->save();
        return redirect('display_departments')->with('flash_message', 'department added') ;
    }
     public function edit_department(Request $request, $id){
            $department = Department::find($id);
        return view('edit_department', compact('department'));
       
     }
     public function update_department(Request $request, $id){
        $department = Department::find($id);
        $input = $request->all();
        $department->update($input);
    
        return redirect('display_departments')->with('flash_message', 'department updated') ;

     }

    public function delete_department( $id){
        //before deleting a department, must delete all the roles assigned to it and their permissions and the 
        //update the users' status department to the default option
        //get the roles of the department
        $listofroles = Departmentrole::where('dep_id', '=' ,$id)->get();
        foreach($listofroles as $role){
            
            $rolepermissions= Rolepermission::where('role_id', '=', $role->id)->get();
            //make a condition that the count is not 0. must have elements to delete 
            //or else , it'kll end up comparing an id to 0 and this thing will crash...again
            //it worked... somehow
            foreach($rolepermissions as $rolepermission){
                Permission::where('id', '=', $rolepermission->permission_id)->delete();
            }
            Rolepermission::where('role_id', '=', $role->id)->delete();

            Userrole::where('role_id', '=', $role->id)->delete();
            Role::where('id', '=', $role->id)->delete();
            
        }
        //delete from departmentroles
        Departmentrole::where('dep_id','=', $id)->delete();
        User::where('dep_id', '=', $id)->update(['dep_id' => 1]);
        Department::destroy($id);
        return redirect('display_departments')->with('flash_message', 'department deleted') ;

    }
    //list all the roles and users under a department... not finished
    public function department_details($id){
        $department = Department::find($id);
        //get the list of users under the department
        $users = User::where('dep_id', '=', $id)->get();
        //get the list of role_ids under that department
       //$listofroles = Departmentrole::where('dep_id', '=' ,$id)->get();
       $listofroles = DB::table('roles')
       ->join('departmentroles', 'departmentroles.role_id', '=', 'roles.id')
       ->where('departmentroles.dep_id', '=', $id)
       ->select('roles.id', 'roles.value') ->get();
       //get the value of roles/ role names
        $roles = Role::all();
        
        return view ('department_details', compact('department', 'users', 'listofroles', 'roles'));
    }

    
   /* public function add_role(){
        $roles = Role::all()
        
    }
    */
}
