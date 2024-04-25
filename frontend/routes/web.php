<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('homepage', ['message' => '']);
});

Route::get('/register', function () {
    return view('register', ['message' => '']);
});
Route::get('/login', [CustomerController::class, 'login']);

Route::post('/registration', [CustomerController::class, 'registerCustomer']);
Route::post('/dashboard', [CustomerController::class, 'dashboard']);
Route::post('/createCustomerPlan', [CustomerController::class, 'createCustomerPlan']);
Route::post('/changeCustomerPlan', [CustomerController::class, 'changeCustomerPlan']);
Route::post('/renewCustomerPlan', [CustomerController::class, 'renewCustomerPlan']);
