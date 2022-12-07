<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Rolepermission;

class PermissionController extends Controller
{
    public function display_permissions(Request $request){
        $permissions = Permission::all();
        return view('display_permissions', compact('permissions'));
        }

        public function create_permission(){
            $roles = Role::all();
            return view('create_permission', compact('roles'));
        }

       

        public function store_permission(Request $request){
                 $permission = new Permission;
                 $rolepermission = new Rolepermission;
                 $permission->value = $request->value;
                 $permission->active = $request->active;
                 $permission->save();
                 //update the rolepermission table
                 $rolepermission->role_id = $request->role;
                 $rolepermission->permission_id = $permission->id;
                 $rolepermission->save();
            return redirect('display_permissions')->with('flash_message', 'permission added') ;
        }
        
        
        public function edit_permission(Request $request, $id){
            $permission = Permission::find($id);
        return view('edit_permission', compact('permission'));
        }

     public function update_permission(Request $request, $id){
        $permission = Permission::find($id);
        $input = $request->all();
        $permission->update($input);
    
        return redirect('display_permissions')->with('flash_message', 'Permission updated') ;

     }


        public function delete_permission( $id){
            Rolepermission::where('permission_id', '=', $id)->delete();
            Permission::destroy($id);
            return redirect('display_permissions')->with('flash_message', 'Permission deleted') ;
    
        }
        public function add_permission(Request $request, $id ){
            $newpermission = new Permission;
            $newpermission->value = $request->value;
            $newpermission->active = $request->active;
            $newpermission->save();
            $newrolepermission = new Rolepermission;
            $newrolepermission->role_id = $request->id;
            $newrolepermission->permission_id = $newpermission->id;
            
            $newrolepermission->save();
            return redirect()->back();
        }
}
