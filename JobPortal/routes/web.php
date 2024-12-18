<?php
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\AccountController;
use \App\Http\Controllers\JobsController;
use \Illuminate\Support\Facades\Route;


// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jobs', [JobsController::class, 'index'])->name('jobs');
Route::get('/jobs/detail/{id}', [JobsController::class, 'jobDetail'])->name('jobDetail');
// Apply job Route
Route::post('/apply-job',[JobsController::class,'applyJob'])->name('applyJob');
Route::post('/save-job',[JobsController::class,'saveJob'])->name('saveJob');
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
        Route::get('/view-job-applications',[AccountController::class,'viewJobApplications'])->name('account.viewJobApplications');
        Route::post('/save-job',[AccountController::class,'saveJob'])->name('account.saveJob');
        Route::get('/my-jobs',[AccountController::class,'myJobs'])->name('account.myJobs');
        Route::get('/edit-job/edit/{jobId}',[AccountController::class,'editJob'])->name('account.editJob');
        Route::post('/update-job/{jobId}',[AccountController::class,'updateJob'])->name('account.updateJob');
        Route::post('/delete-job',[AccountController::class,'deleteJob'])->name('account.deleteJob');
        Route::get('/my-job-applications',[AccountController::class,'myJobApplications'])->name('account.myJobApplications');
        Route::post('/remove-job-application',[AccountController::class,'removeJobs'])->name('account.removeJobs');
        Route::get('/saved-jobs',[AccountController::class,'savedJobs'])->name('account.savedJobs');
        Route::post('/remove-saved-job',[AccountController::class,'removeSavedJob'])->name('account.removeSavedJob');
        // Change Password
        Route::post('/change-password',[AccountController::class,'changePassword'])->name('account.changePassword');

        
    });

});

