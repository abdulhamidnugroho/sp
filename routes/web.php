<?php

use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\EvidenceController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('diseases', [DiseaseController::class, 'index'])->name('disease.index');

Route::get('evidence', [EvidenceController::class, 'index'])->name('evidence.index');

Route::get('analysis', [AnalysisController::class, 'index'])->name('analysis.index');

