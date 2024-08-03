<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\PotensiPermasalahanController;
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

Route::post('logout-form/{id}', [DashboardController::class, 'logout'])->name('logout_form');

Route::middleware(['web', 'auth.token'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/desa', [DesaController::class, 'index'])->name('desa');
    Route::post('/desa/update/{id}', [DesaController::class, 'update_desa'])->name('update-desa');

    Route::get('/potensipermasalahan', [PotensiPermasalahanController::class, 'index'])->name('potensipermasalahan');
    Route::get('/potensipermasalahan/add', [PotensiPermasalahanController::class, 'add_data'])->name('add-permasalahan');
    Route::post('/potensipermasalahan/add/{id}', [PotensiPermasalahanController::class, 'add_process'])->name('add-permasalahan-process');
    Route::get('/potensipermasalahan/edit', [PotensiPermasalahanController::class, 'edit_data'])->name('edit-permasalahan');
    Route::put('/potensipermasalahan/edit/{id}', [PotensiPermasalahanController::class, 'edit_process'])->name('edit-permasalahan-process');
    Route::delete('/potensipermasalahan/delete/{id}', [PotensiPermasalahanController::class, 'delete_process'])->name('delete-process');

    // Route::get('/program-bantuan', [ProgramBantuanController::class, 'index']);

    // Route::post('/rekomendasi-bantuan', [ProgramBantuanController::class, 'rekomendasi_bantuan'])->name('rekomendasi_bantuan');
});
