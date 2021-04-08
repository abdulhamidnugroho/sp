<?php

use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\GeneralController;
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
Route::get('disease/create', [DiseaseController::class, 'create'])->name('disease.create');
Route::post('disease/store', [DiseaseController::class, 'store'])->name('disease.store');
Route::get('disease/edit', [DiseaseController::class, 'edit'])->name('disease.edit');
Route::post('disease/update', [DiseaseController::class, 'update'])->name('disease.update');

Route::get('evidence', [EvidenceController::class, 'index'])->name('evidence.index');
Route::get('evidence/table', [EvidenceController::class, 'getData'])->name('evidence.table');
Route::get('evidence/create', [EvidenceController::class, 'create'])->name('evidence.create');
Route::post('evidence/store', [EvidenceController::class, 'store'])->name('evidence.store');
Route::get('evidence/edit', [EvidenceController::class, 'edit'])->name('evidence.edit');
Route::post('evidence/update', [EvidenceController::class, 'update'])->name('evidence.update');

Route::get('analysis', [AnalysisController::class, 'index'])->name('analysis.index');
Route::post('analysis', [AnalysisController::class, 'analysis'])->name('analysis');

Route::get('base', [GeneralController::class, 'index'])->name('base.index');
Route::get('base/table', [GeneralController::class, 'getData'])->name('base.table');
Route::get('base/create', [GeneralController::class, 'create'])->name('base.create');
Route::post('base/store', [GeneralController::class, 'store'])->name('base.store');
Route::get('base/edit', [GeneralController::class, 'edit'])->name('base.edit');
Route::post('base/update', [GeneralController::class, 'update'])->name('base.update');
