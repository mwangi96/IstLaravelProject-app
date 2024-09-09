<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AlumniProfileController;



Route::group(['middleware' => ['role:super-admin|admin|alumni']], function() {

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'updatePermissionToRole']);

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);

    Route::get('jobs/{jobId}/delete', [App\Http\Controllers\JobController::class, 'destroy']);

    Route::resource('jobs', App\Http\Controllers\JobController::class);
    Route::get('/jobs/index', [App\Http\Controllers\JobController::class, 'index'])->name('jobs.index');
    Route::post('/jobs/store', [App\Http\Controllers\JobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}', [App\Http\Controllers\JobController::class, 'show'])->name('jobs.show');
    Route::get('/jobs/{job}/edit', [App\Http\Controllers\JobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{job}', [App\Http\Controllers\JobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}', [App\Http\Controllers\JobController::class, 'destroy'])->name('jobs.destroy');
    //  Job application routes
    Route::get('/jobs/{id}/apply', [App\Http\Controllers\JobController::class, 'apply'])->name('jobs.apply');
    Route::post('/jobs/apply/{job}', [App\Http\Controllers\JobController::class, 'applyStore'])->name('jobs.applyStore');

      //applications routes
    Route::get('/applications', [App\Http\Controllers\ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/review/{id}', [App\Http\Controllers\ApplicationController::class, 'review'])->name('application.review');
    Route::get('/applications/approve/{id}', [App\Http\Controllers\ApplicationController::class, 'approve'])->name('application.approve');
    Route::get('/applications/deny/{id}', [App\Http\Controllers\ApplicationController::class, 'deny'])->name('application.deny');

      // AlumniProfile Routes
    Route::resource('alumni_profiles', App\Http\Controllers\AlumniProfileController::class);
    Route::get('/alumni_profiles/index', [App\Http\Controllers\AlumniProfileController::class, 'index'])->name('alumni_profiles.index');
    Route::get('alumni_profiles/create', [App\Http\Controllers\AlumniProfileController::class, 'create'])->name('alumni_profiles.create');
    Route::post('alumni_profiles', [App\Http\Controllers\AlumniProfileController::class, 'store'])->name('alumni_profiles.store');
    Route::get('alumni_profiles/{id}', [App\Http\Controllers\AlumniProfileController::class, 'show'])->name('alumni_profiles.show');
    Route::get('alumni_profiles/{id}/edit', [App\Http\Controllers\AlumniProfileController::class, 'edit'])->name('alumni_profiles.edit');
    Route::put('alumni_profiles/{id}', [App\Http\Controllers\AlumniProfileController::class, 'update'])->name('alumni_profiles.update');
    Route::get('/alumni-profiles/{profile}/edit', [AlumniProfileController::class, 'edit'])->name('alumni-profiles.edit');
    Route::put('/alumni-profiles/{profile}', [AlumniProfileController::class, 'update'])->name('alumni-profiles.update');
    Route::delete('alumni_profiles/{id}', [App\Http\Controllers\AlumniProfileController::class, 'destroy'])->name('alumni_profiles.destroy');

      //projects routes
    Route::resource('projects', App\Http\Controllers\ProjectController::class);
    Route::get('/projects/index', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
    Route::get('projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create');
    Route::post('projects', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');

    //notifications route
    Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/mark-as-read', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');


});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
