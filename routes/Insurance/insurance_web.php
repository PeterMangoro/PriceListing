<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Car\CarInsuranceController;


Route::resource('car-insurance', CarInsuranceController::class);

Route::get('car-insurance-home', [CarInsuranceController::class, 'show'])->name('car_insurance.show');
