<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Testing;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']],function () {
    // Route::get('/students',[StudentController::class, 'index']);
    Route::post('/students/{perpage}',[StudentController::class, 'paginatedStudents']);
    Route::get('/profile/{id}',[UserController::class, 'show']);
    Route::post('/students',[StudentController::class, 'store']); 
    Route::put('/students/{student}', [StudentController::class, 'update']);
    Route::delete('/students/{student}', [StudentController::class, 'destroy']);

});

// Working
/* Route::group(['prefix' => 'test'], function () {
    Route::get('/default', [Testing::class, 'defaultTesting']);
}); */


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
