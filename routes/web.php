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


Route::middleware(['set.user.attrs'])->group(function (){

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');

    Route::get('/roles',\App\Http\Livewire\Pages\RolePage::class)->name('role.index')->middleware(['permission:view role']);
    Route::get('/permissions',\App\Http\Livewire\Pages\PermissionPage::class)->name('permission.index')->middleware(['permission:view permission']);
    // users
    Route::get('/users',\App\Http\Livewire\Pages\UserPage::class)->name('user.index')->middleware(['permission:view user']);
    Route::get('/users/create',\App\Http\Livewire\Pages\Users\UserAdd::class)->name('user.create')->middleware(['permission:add user']);
    Route::get('/users/edit/{user}',\App\Http\Livewire\Pages\Users\UserEdit::class)->name('user.edit')->middleware(['permission:update user']);

    // profile
    Route::get('/profile',\App\Http\Livewire\Pages\Profile::class)->name('profile.show');

    // partners list
    Route::get('/partners',\App\Http\Livewire\Pages\PartnersPage::class)->name('partner.index');
    Route::get('/partners/edit/{user}',\App\Http\Livewire\Pages\Partners\PartnerEdit::class)->name('partner.edit');

    // providers
    Route::get('/providers',\App\Http\Livewire\Pages\ProvidersPage::class)->name('provider.index')->middleware(['permission:view provider']);
    Route::get('/providers/create',\App\Http\Livewire\Pages\Providers\ProviderAdd::class)->name('provider.create')->middleware(['permission:add provider']);
    Route::get('/providers/edit/{provider}',\App\Http\Livewire\Pages\Providers\ProviderEdit::class)->name('provider.edit')->middleware(['permission:update provider']);

    // levels
    Route::get('/levels',\App\Http\Livewire\Pages\LevelsPage::class)->name('level.index')->middleware(['permission:view level']);
    Route::get('/levels/create',\App\Http\Livewire\Pages\Levels\LevelAdd::class)->name('level.create')->middleware(['permission:add level']);
    Route::get('/levels/edit/{level}',\App\Http\Livewire\Pages\Levels\LevelEdit::class)->name('level.edit')->middleware(['permission:update level']);

    // memberships
    Route::get('/memberships',\App\Http\Livewire\Pages\MemberShipPage::class)->name('membership.index')->middleware(['permission:view membership']);
    Route::get('/memberships/create',\App\Http\Livewire\Pages\MemberShips\MemberShipAdd::class)->name('membership.create')->middleware(['permission:add membership']);
    Route::get('/memberships/edit/{membership}',\App\Http\Livewire\Pages\MemberShips\MemberShipEdit::class)->name('membership.edit')->middleware(['permission:update membership']);

});

Route::get('/{name}', function ($name) {

        $html = str_contains($name,'html');
        if($html)
            return view('app.'.str_replace('.html','',$name));

        abort(404);
});

// referral login
Route::get('/referral',\App\Http\Livewire\Pages\RegisterReferral::class)->name('referral.register')->middleware('referral');

Route::get('/',\App\Http\Livewire\Pages\Index::class)->name('index');
Route::get('/login',\App\Http\Livewire\Pages\LoginPage::class)->middleware(['guest:'.config('fortify.guard')])->name('login');
Route::get('/register',\App\Http\Livewire\Pages\RegisterPage::class)->middleware(['guest:'.config('fortify.guard')])->name('register');
Route::get('/referral',\App\Http\Livewire\Pages\RegisterReferral::class)->name('referral.register')->middleware(['guest:'.config('fortify.guard'),'referral']);
Route::get('/test',\App\Http\Livewire\Test::class)->name('test');

});


//Route::get('/select2', \App\Http\Livewire\Common\Select2::class);
