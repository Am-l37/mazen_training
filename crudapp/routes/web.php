<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

//Routes for departments
Route::get('/display_departments', [DepartmentController::class, 'display_departments']);
Route::get('/store_department', [DepartmentController::class, 'store_department']);
Route::get('/edit_department/{id}', [DepartmentController::class, 'edit_department']);
Route::post('/update_department/{id}', [DepartmentController::class, 'update_department']);
Route::get('/create_department', [DepartmentController::class, 'create_department']);
Route::delete('/delete_department/{id}', [DepartmentController::class, 'delete_department']);
Route::get('/department_details/{id}', [DepartmentController::class, 'department_details']);

//Routes for users
Route::get('/display_users', [UserController::class, 'display_users']);
Route::get('/store_user', [UserController::class, 'store_user']);
Route::get('/create_user', [UserController::class, 'create_user']);
Route::get('/edit_user/{id}', [UserController::class, 'edit_user']);
Route::post('/update_user/{id}', [UserController::class, 'update_user']);
Route::delete('/delete_user/{id}', [UserController::class, 'delete_user']);
//remove user from department
Route::get('/remove_user/{id}', [UserController::class, 'remove_user']);
Route::get('/user_info/{id}', [UserController::class, 'user_info']);
Route::get('/assign_role/{id}', [UserController::class, 'assign_role']);


//Routes for permissions
Route::get('/display_permissions', [PermissionController::class, 'display_permissions']);
Route::get('/store_permission', [PermissionController::class, 'store_permission']);
Route::get('/create_permission', [PermissionController::class, 'create_permission']);
Route::get('/edit_permission/{id}', [PermissionController::class, 'edit_permission']);
Route::post('/update_permission/{id}', [PermissionController::class, 'update_permission']);
Route::delete('/delete_permission/{id}', [PermissionController::class, 'delete_permission']);
//add permission from a role_info page
Route::get('add_permission/{id}', [PermissionController::class, 'add_permission']);

//Routes for roles
Route::get('/display_roles', [RoleController::class, 'display_roles']);
Route::get('/store_role', [RoleController::class, 'store_role']);
Route::get('/create_role', [RoleController::class, 'create_role']);
Route::get('/edit_role/{id}', [RoleController::class, 'edit_role']);
Route::post('/update_role/{id}', [RoleController::class, 'update_role']);
Route::delete('/delete_role/{id}', [RoleController::class, 'delete_role']);
Route::get('/role_info/{id}', [RoleController::class, 'role_info']);
