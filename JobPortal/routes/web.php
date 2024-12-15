<?php
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\AccountController;
use \Illuminate\Support\Facades\Route;


// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Guest Middleware Routes
// Grouped Account Routes
Route::prefix('account')->group(function () {
    // Guest Middleware Routes
    Route::middleware(['guest'])->group(function () {
        Route::get('/register', [AccountController::class, 'registration'])->name('account.registration');
        Route::post('/process-register', [AccountController::class, 'processRegistration'])->name('account.processRegistration');
        Route::get('/login', [AccountController::class, 'login'])->name('account.login');
        Route::post('/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
    });

    // Auth Middleware Routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::put('/updateProfile', [AccountController::class, 'updateProfile'])->name('account.updateProfile');
        Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
        Route::post('/updateProfileImg', [AccountController::class, 'updateProfileImg'])->name('account.updateProfileImg');
        Route::get('/createJob', [AccountController::class, 'createJob'])->name('account.createJob');
        Route::post('/save-job',[AccountController::class,'saveJob'])->name('account.saveJob');
        Route::get('/my-jobs',[AccountController::class,'myJobs'])->name('account.myJobs');

        
    });

});

