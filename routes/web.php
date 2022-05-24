<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\OrganizationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::resource('admin/user', AdminUserController::class);

// Route::get('/admin/user/create', function () {
//     return view('admin.user.create');
// });
// Route::get('/admin/user/view', function () {
//     return view('admin.user.index');
// });

Route::resource('admin/district', DistrictController::class);
Route::resource('admin/designation', DesignationController::class);
Route::resource('admin/project', ProjectController::class);
Route::resource('admin/organization', OrganizationController::class);