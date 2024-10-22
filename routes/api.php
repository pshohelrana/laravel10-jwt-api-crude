<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;







use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\LoansystemController;
use App\Http\Controllers\Api\LoanapplicantController;
use App\Http\Controllers\Api\WithdrawController;
use App\Http\Controllers\Api\DipositController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\LoanactiveController;
use App\Http\Controllers\Api\IncomeController;
use App\Http\Controllers\Api\ExpenseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("/members/update/{id}",[MemberController::class,"updateMembers"]);
Route::post("/users/login",[UserController::class,"login"]);



Route::post("register",[ApiController::class,"register"]);
Route::post("login",[ApiController::class,"login"]);

Route::group([
    "middleware" => ["auth:api"]
], function() {
    Route::get("profile", [ApiController::class, "profile"]);
    Route::get("refresh", [ApiController::class, "refreshToken"]);
    Route::get("logout", [ApiController::class, "logout"]); 
});







Route::apiResources([
    'loansystems' => LoansystemController::class,
    //'categories' => CategoryController::class,
    'loanapplicants' => LoanapplicantController::class,
    'withdraws' => WithdrawController::class,
    'diposits' => DipositController::class,
    'members' => MemberController::class,
    'loanactives' => LoanactiveController::class,
    'incomes' => IncomeController::class,
    'expenses' => ExpenseController::class,
    //'uoms'=>UoMController::class,
    //'manufacturers'=>ManufacturerController::class,
    //'sections'=>SectionController::class
]);

