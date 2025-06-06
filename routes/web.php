<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\InfoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Auth Routes
 */
require __DIR__.'/auth.php';

/**
 * Frontend Routes
 */

Route::get('/', [HomeController::class, 'index'])->name('page.home');
Route::get('/info-zum-voting', [InfoController::class, 'index'])->name('page.info');
Route::get('/uebersichtskarte', [MapController::class, 'index'])->name('page.map');
Route::get('/{building:slug}', [BuildingController::class, 'index'])->name('page.project');


/**
 * Backend Routes
 */

Route::get('/dashboard/{any?}', function () {
  return view('pages.dashboard');
})->where('any', '.*')->middleware(['auth', 'verified'])->name('page.dashboard');

Route::get('/error/{any?}', function () {
  return view('pages.dashboard');
})->where('any', '.*')->middleware(['auth', 'verified'])->name('page.dashboard');