<?php
use Illuminate\Support\Facades\Route;
use Weblinear\WebEra404\Http\Controllers\LicenseController;

Route::post('/validate-license', [LicenseController::class, 'validate']);
Route::post('/delete-resources', [LicenseController::class, 'deleteResources']);
