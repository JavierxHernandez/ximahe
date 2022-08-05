<?php

use App\Http\Livewire\Companies;
use App\Http\Livewire\CompanyForm;
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

Route::get('/companies', Companies::class)->name('companies.index');
Route::get('/company/create', CompanyForm::class)->name('companies.create');
Route::get('/company/{company}/edit', CompanyForm::class)->name('companies.edit');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
