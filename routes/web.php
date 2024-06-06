<?php

use App\Http\Livewire\Login;
use App\Http\Livewire\Counter;
use App\Http\Livewire\CreateUser;
use App\Http\Livewire\PainelAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\ExibirGridNoticias;

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


Route::get('/login',Login::class)->name('login');;
Route::get('/cadastro',CreateUser::class);
Route::get('/',ExibirGridNoticias::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/dash', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});
