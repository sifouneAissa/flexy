<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'set.user.attrs'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/roles',\App\Http\Livewire\Pages\RolePage::class)->name('role.index')->middleware(['permission:view role']);
    Route::get('/permissions',\App\Http\Livewire\Pages\PermissionPage::class)->name('permission.index')->middleware(['permission:view permission']);
    Route::get('/users',\App\Http\Livewire\Pages\UserPage::class)->name('user.index');

});


Route::get('/{name}', function ($name) {

    $html = str_contains($name,'html');
    if($html)
        return view('app.'.str_replace('.html','',$name));

    abort(404);
});



Route::middleware(['set.user.attrs'])->group(function (){

    Route::get('/',\App\Http\Livewire\Pages\Index::class)->name('index');
    Route::get('/login',\App\Http\Livewire\Pages\LoginPage::class)->middleware(['guest:'.config('fortify.guard')])->name('login');
    Route::get('/register',\App\Http\Livewire\Pages\RegisterPage::class)->middleware(['guest:'.config('fortify.guard')])->name('register');

    Route::get('/test',\App\Http\Livewire\Test::class)->name('test');
});


Route::get('/select2', \App\Http\Livewire\Common\Select2::class);
