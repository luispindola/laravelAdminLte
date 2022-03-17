<?php

use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('dash.index');
});
*/


//Ruta HOME:
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dash.index');
//Rutas de autenticación
Auth::routes();

Route::group(['middleware'  =>  ['auth']],function(){
    Route::resource('roles',RolController::class);

    //Prueba domPDF
    Route::get('/users/{user_id}/dompdf',[UserController::class,'dompdf'])->name('users.dompdf');

    Route::resource('users',UserController::class);
    
});