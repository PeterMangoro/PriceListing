<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Car\CarInsuranceController;


Route::resource('albenia/car-insurance', CarInsuranceController::class);

