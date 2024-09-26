<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
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
Route::get("/resister", [RegisteredUserController::class, "resister"])->name("register.create");
Route::post("/resister", [RegisteredUserController::class, "store"])->name("register.store");
Route::get("/login", [AuthenticatedSessionController::class, "create"])->name("login");
Route::post("/login", [AuthenticatedSessionController::class, "store"])->name("login.store");
*/
Route::middleware(['auth','verified'])
    ->group(function () {
        Route::get("/", [UserController::class, "index"]);
        Route::post("/start-work", [UserController::class, "startWork"]);
        Route::post("/end-work", [UserController::class, "endWork"]);
        Route::post("/start-break", [UserController::class, "startBreak"]);
        Route::post("/end-break", [UserController::class, "endBreak"]);
        Route::get("/date", [UserController::class, "date"]);
        Route::get("/date/add-date",[UserController::class,"addDate"]);
        Route::get("/date/sub-date",[UserController::class,"subDate"]);
        Route::get("/users",[UserController::class,"users"]);
        Route::get("/users/detail",[UserController::class,"detail"])->name("detail");
        Route::get("/users/detail/add-date",[UserController::class,"addDateOnDetail"])->name("addDate");
        Route::get("/users/detail/sub-date",[UserController::class,"subDateOnDetail"])->name("subDate");
        Route::get("/logout", [AuthenticatedSessionController::class, "destroy"]);
    });
