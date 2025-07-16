<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\RegistrationEditController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\SubAreaController;
use App\Http\Controllers\Admin\UserRoleController;

//welcome route
Route::get('/', function () {
    return view('welcome');
});

//user registration route
Route::post('/registrations', [RegistrationController::class, 'store'])->middleware('auth')->name('registration.store');


Route::post('/save-temp-form', function (\Illuminate\Http\Request $request) {
    session(['registration_data' => $request->all()]);
    return response()->json(['saved' => true]);
});

//creating/editing user registration form
Route::get('registration-form', [RegistrationController::class, 'createOrEdit'])->middleware('auth')->name('registrations.edit');

//user registration form submission
Route::post('registrations', [RegistrationController::class, 'store'])->middleware('auth')->name('registration.store');

//editing user registration form
Route::put('/registrations/{id}', [RegistrationController::class, 'update'])->middleware('auth')->name('registration.update');

//admin's user creation routes
Route::middleware(['auth', 'IsAdmin'])->prefix('admin')->name('admin.users.')->group(function () {

    //admin dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard'); // admin.dashboard
    //manage areas of expertise
    Route::resource('areas', AreaController::class)->except(['show']);
    //manage sub-areas of expertise
    Route::resource('sub-areas', SubAreaController::class)->except(['show']);

    //admin edit registration
    Route::get('registrations/{id}/edit', [RegistrationEditController::class, 'edit'])->name('registrations.edit');
    Route::put('registrations/{id}', [RegistrationEditController::class, 'update'])->name('registrations.update');
    Route::get('registrations/{id}/view', [RegistrationEditController::class, 'show'])->name('registrations.view');
    Route::delete('registrations/{id}', [RegistrationEditController::class, 'destroy'])->name('registrations.destroy');

    //admin role management


    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::post('/', [RoleController::class, 'store'])->name('store');
        Route::get('{role}/edit', [RoleController::class, 'edit'])->name('edit');
        Route::put('{role}', [RoleController::class, 'update'])->name('update');
        Route::delete('{role}', [RoleController::class, 'destroy'])->name('destroy');
    });


    // user-role assignment routes
    Route::prefix('roles-assignment')->name('roles.assignment.')->group(function () {
        Route::get('/', [UserRoleController::class, 'index'])->name('index');
        Route::post('/assign', [UserRoleController::class, 'assign'])->name('store');
    });




    //admin user + registration creation 
    Route::get('/users/create', [UserController::class, 'create'])->name('create');  // admin.users.create
    Route::post('/users', [UserController::class, 'store'])->name('store');          // admin.users.store
});




require __DIR__ . '/auth.php';
