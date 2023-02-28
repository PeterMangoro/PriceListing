<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Shared\SocialController;
use App\Http\Controllers\Shared\ProfileController;
use App\Http\Controllers\Shared\EmployeeController;
use App\Http\Controllers\Shared\AttachmentController;

// Route::get('practice', [PracticeController::class, 'index'])->name('practice');
// Forgot Password
// Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
// Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
// password end

// Route::group(['middleware' => 'role:SuperAdmin'], function () {
// });

Route::delete('attachment/{attachment}/', [AttachmentController::class, 'destroy'])->name('attachments.destroy');
Route::post('restore/{attachment}/', [AttachmentController::class, 'update'])->name('attachment.restore');
Route::get('file/{attachment:uuid}', [AttachmentController::class, 'show'])->name('attachments.show');

Route::get('{user:username}', [ProfileController::class,'show'])->name('company_profile.show');
Route::post('company/profile', [ProfileController::class, 'update'])->name('company_profile.update');
Route::get('{user:username}/team', [ProfileController::class,'team'])->name('company_profile.team');


Route::resource('company/employees', EmployeeController::class)->except('show');
Route::resource('company/socials', SocialController::class)->except('show');

// Route::get('pricing')
// Route::get('editor', [BlogController::class,'index']);
Route::get('/symlink/a', function () {    
    Artisan::call('storage:link');
});

Route::get('/pricing', function () {    
   return inertia('Pricing');
});