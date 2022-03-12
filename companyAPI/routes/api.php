<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//
//Route::resource('companies', 'CompanyController');
////Route::post('companies','CompanyController@store');

Route::prefix('companies')->group(function(){
    Route::post("/create", "App\Http\Controllers\CompanyController@create");
    Route::get("/", "App\Http\Controllers\CompanyController@index");
    Route::post("/", "App\Http\Controllers\CompanyController@store");
    Route::put("/companies/{company}", "App\Http\Controllers\CompanyController@update");
    Route::delete("/companies/{company}", "App\Http\Controllers\CompanyController@delete");
});

Route::prefix('employees')->group(function(){
    Route::post("/create", "App\Http\Controllers\EmployeeController@create");
    Route::get("/", "App\Http\Controllers\EmployeeController@index");
    Route::post("/", "App\Http\Controllers\EmployeeController@store");
    Route::put("/companies/{company}", "App\Http\Controllers\EmployeeController@update");
    Route::delete("/companies/{company}", "App\Http\Controllers\EmployeeController@delete");
});
