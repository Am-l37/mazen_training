<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Departmentrole;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Userrole;
use App\Models\Rolepermission;

class UserController extends Controller
{
    public function display_users(Request $request){
        $users = User::all();
        
        return view('display_users', compact('users'));
        }

        public function create_user(){
            //send list of departments and pick one in the form... 
            $departments = Department::all();
            return view('create_user', compact('departments'));
        }
        public function store_user(Request $request){
           // $input = $request->all();
            //Department::create($input);
    
                $user = new User;
                $user->name = $request->name;
                $user->dep_id = $request->department;
                $user->save();
            return redirect('display_users')->with('flash_message', 'user added') ;
        }

        public function edit_user(Request $request, $id){
            $user = User::find($id);
            $departments = Department::all();
            $current_dep = Department::find($user->dep_id);
        return view('edit_user', compact('user', 'departments', 'current_dep'));
       
     }
        public function update_user(Request $request, $id){
            $user = User::find($id);
            //$input = $request->all();
            //$user->update($input);
            $user->name = $request->name;
                $user->dep_id = $request->department;
                $user->save();
    
        return redirect('display_users')->with('flash_message', 'User updated') ;

        }
        public function delete_user( $id){
            $userroles = Userrole::where('user_id', '=', $id)->delete();

            User::destroy($id);
        return redirect('display_users')->with('flash_message', 'User deleted') ;

    }
    public function remove_user($id){
        $user = User::find($id);
        $user->dep_id = 1 ;
        $user->save();
        return redirect()->back();

    }


    //assign a role to a user
    public function assign_role(Request $request, $id){
        //get the department of the user
        $user = User::find($id);
         //$department = Department::find($user->id);
        //update userroles table
        $new = new Userrole;
        $new->user_id = $user->id;
        $new->role_id = $request->role;
        $new->save();
        return redirect()->back();
        
    }


    //display thr department and list of roles and permissions for the user
    public function user_info($id){
            $user = User::find($id);
            $departments = Department::all();
            $current_dep = Department::find($user->dep_id);
            $listofroles = Departmentrole::where('dep_id', '=', $current_dep->id)->get();
            
            //list of roles assigned to the user from userroles table
            //this is list of roles of the user
            $list = Userrole::where('user_id', '=', $id)->get();
            
            
            //get the list of permissions of each role
            
        
            
            //get all permissions then filter in the page... maybe
           // $listofpermissions= Rolepermission::all();
           $listofpermissions = DB::table('rolepermissions')
                    ->join('permissions', 'rolepermissions.permission_id', '=', 'permissions.id')
                    
                    ->select( 'permissions.id', 'permissions.value', 'rolepermissions.role_id')
                   ->get();
           
            $allpermissions = Permission::all();            
            //get role names
           // $names = Role::all();
           $names = DB::table('userroles')
                ->join('roles', 'userroles.role_id', '=', 'roles.id')
                ->select('roles.id','roles.value')
                ->get();

                return view('user_info', compact('user', 'allpermissions',  'names', 'current_dep', 'list', 'listofroles', 'listofpermissions'));
    }
}
