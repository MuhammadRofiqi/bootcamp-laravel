<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Master\MahasiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('datamasters.dosen.list');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::group(
    ['middleware' => 'auth'],
    function () {

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::name('mahasiswa')->prefix('mahasiswa')
            // ->middleware('auth')
            ->group(function () {
                Route::get('/', [MahasiswaController::class, 'index'])->name('.index');
                Route::get('/datatable', [MahasiswaController::class, 'dtMahasiswa'])->name('.datatable');
                Route::get('/detail/{nim}', [MahasiswaController::class, 'detail'])->name('.detail');
                Route::get('/insert', [MahasiswaController::class, 'insert'])->name('.insert')->middleware('can:mhs-active');
                Route::post('/create', [MahasiswaController::class, 'create'])->name('.create');
            });
    }
);
