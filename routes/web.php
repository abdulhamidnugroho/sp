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

Route::get('disease', [DiseaseController::class, 'index'])->name('disease.index');
Route::get('disease/table', [DiseaseController::class, 'getData'])->name('disease.table');

Route::get('evidence', [EvidenceController::class, 'index'])->name('evidence.index');
Route::get('evidence/table', [EvidenceController::class, 'getData'])->name('evidence.table');

Route::get('analysis', [AnalysisController::class, 'index'])->name('analysis.index');
Route::post('analysis', [AnalysisController::class, 'analysis'])->name('analysis');

