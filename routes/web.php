<?php

use App\Http\Livewire\Companies;
use App\Http\Livewire\CompanyForm;
use App\Http\Livewire\Departments;
use App\Http\Livewire\DepartmentForm;
use App\Http\Livewire\Documents;
use App\Http\Livewire\DocumentForm;
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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/companies', Companies::class)->name('companies.index');
    Route::get('/company/create', CompanyForm::class)->name('companies.create');
    Route::get('/company/{company}/edit', CompanyForm::class)->name('companies.edit');

    Route::get('/departments', Departments::class)->name('departments.index');
    Route::get('/departments/create', DepartmentForm::class)->name('departments.create');
    Route::get('/departments/{department}/edit', DepartmentForm::class)->name('departments.edit');

    Route::get('/documents', Documents::class)->name('documents.index');
    Route::get('/documents/create', DocumentForm::class)->name('documents.create');
    Route::get('/documents/{document}/edit', DocumentForm::class)->name('documents.edit');
});
