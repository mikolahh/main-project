<?php
namespace App\Http\Controllers;
use App\Livewire\Pages\Admin\Dashboard;
use App\Livewire\Pages\Admin\Users;
use App\Livewire\Pages\Admin\Admins;
use Illuminate\Support\Facades\Route;
use App\Livewire\ResetPassword;


Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/draft', [PageController::class, 'draft'])->name('draft');
                            // Laravel Password Broker ожидает: password.reset
Route::get('auth/reset-password/{token}', [PageController::class, 'resPsw'])->name('password.reset');
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/uslugi', [PageController::class, 'services'])->name('services');
Route::get('/uslugi/razrabotka-saitov', [PageController::class, 'serviceSites'])->name('serviceSites');
Route::get('/uslugi/razrabotka-saitov/landing', [PageController::class, 'serviceLanding'])->name('serviceLanding');
Route::get('/uslugi/razrabotka-saitov/vizitka', [PageController::class, 'serviceCutaway'])->name('serviceCutaway');
Route::get('/uslugi/razrabotka-saitov/catalog', [PageController::class, 'serviceCatalog'])->name('serviceCatalog');
Route::get('/uslugi/kontekstnaya-reklama', [PageController::class, 'serviceCont'])->name('serviceCont');
Route::get('/uslugi/razrabotka-botov', [PageController::class, 'serviceBots'])->name('serviceBots');
Route::get('/uslugi/parsing', [PageController::class, 'serviceParsing'])->name('serviceParsing');


Route::middleware(['auth', 'verified', 'role:admin,owner'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', Dashboard::class)
            ->name('dashboard');
        Route::middleware('role:owner')->group(function () {
            Route::get('/users', Users::class)
                ->name('users');

            Route::get('/admins', Admins::class)
                ->name('admins');
        });
    });



