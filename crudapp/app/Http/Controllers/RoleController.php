<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Department;
use App\Models\Rolepermission;
use App\Models\Permission;
use App\Models\Userrole;
use App\Models\Departmentrole;

class RoleController extends Controller
{
    public function display_roles(Request $request){
        $roles = Role::all();
        return view('display_roles', compact('roles'));
        
        }

        public function create_role(){
            $departments = Department::all();
            return view('create_role', compact('departments'));
        }

        public function store_role(Request $request){
            
     
                 $role = new Role;
                 $departmentrole = new Departmentrole;
                 $role->value = $request->value;
                 $role->save();
                 //store it in the departmentrole table
                 $departmentrole->dep_id = $request->department;
                 $departmentrole->role_id = $role->id;
                 
                $departmentrole->save();
             return redirect('display_roles')->with('flash_message', 'Role added') ;
         }

         public function edit_role(Request $request, $id){
            $role = Role::find($id);
                return view('edit_role', compact('role'));
       
            }

            public function update_role(Request $request, $id){
                $role = Role::find($id);
                $input = $request->all();
                $role->update($input);
            
                return redirect('display_roles')->with('flash_message', 'Role updated') ;
        
             }

             public function delete_role( $id){
               
                //go to rolepermission, get the ids of the permissions that belong to that role
                //delete the rolepermissions with role_id = id of the role then 
                //go to table permissions and delete all the permissions 
                //delete all records from userrole

                //also, empty departmentroles
                // 1) 
                    $listofpermissions = Rolepermission::where('role_id', '=', $id)->get();
                     foreach($listofpermissions as $permission)
                        Permission::where('id', '=', $permission->id)->delete();
                
                //2)
                Rolepermission::where('role_id', '=', $id)->delete();
                DEpartmentrole::where('role_id', '=', $id)->delete();
                //3)
                $listofuserrole = Userrole::where('role_id', '=', $id)->delete();
                //4)
                Role::destroy($id);
                return redirect('display_roles')->with('flash_message', 'Role deleted') ;
        
            }

            public function role_info($id){
                //displays role details: dep and permissions
                $listofpermissions = Rolepermission::where('role_id', '=', $id)->get();
                $permissions = Permission::all();
                $roleId = $id;
                return view('role_info', compact('listofpermissions', 'permissions', 'roleId' ));
            }
}
