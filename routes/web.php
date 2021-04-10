<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserCOntroller;
use App\Http\Controllers\KaprodiController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/auth/save',[MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check',[MainController::class, 'check'])->name('auth.check');
Route::get('/auth/logout',[MainController::class, 'logout'])->name('auth.logout');
Route::get('/auth/login',[MainController::class, 'login'])->name('auth.login');
Route::get('/auth/register',[MainController::class, 'register'])->name('auth.register');


Route::get('/kaprodi/dashboard',[KaprodiController::class, 'dashboard'])->name('kaprodi.dashboard');
Route::post('/user/test',[UserCOntroller::class, 'UserGetTestScore'])->name('user.test');
Route::post('user/test/dominan',[UserCOntroller::class, 'UserGetTestScoreDominan'])->name('user.test.dominan');

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/admin/dashboard/{id}/delete',[UserCOntroller::class, 'DeleteUserById'])->name('admin.user.delete');
    
    Route::get('/admin/dashboard',[UserCOntroller::class, 'ReadAllUserAdminPage'])->name('admin.dashboard');
    Route::post('updatesuser/{id}',[UserCOntroller::class, 'UpdateUserById'])->name('admin.user.update');
    Route::post('/admin/register-user',[UserCOntroller::class, 'CreateUser'])->name('admin.register.user');

    Route::get('/admin/dashboard/{id}/update',[MainController::class, 'updateuser'])->name('admin.user.updatepage');
    Route::get('/admin/dashboard/adduser',[MainController::class, 'adduser']);
    Route::get('/admin/settings',[MainController::class,'settings']);
    Route::get('/admin/profile',[MainController::class,'profile']);
    Route::get('/admin/staff',[MainController::class,'staff']);
});


