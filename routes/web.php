<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Backend\QuizController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\UserAuthController;
use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\AdminPasswordResetController;
use App\Http\Controllers\Backend\AdminPasswordUpdateController;
use App\Http\Controllers\Backend\QuizTopicController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\QuizQuestionController;
use App\Http\Controllers\Backend\AdminProfileUpdateController;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Admin;



Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
});



// frontend page routes here 
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/create-quiz', [FrontendController::class, 'createQuiz'])->name('frontend.quiz');
Route::get('/all-quiz', [FrontendController::class, 'allQuiz'])->name('frontend.all-quiz');


// Frontend User Login Register here 
Route::get('/login', [UserAuthController::class, 'index'])->name('login');
Route::post('/post-login', [UserAuthController::class, 'postLogin'])->name('login.post');
Route::get('/register', [UserAuthController::class, 'registration'])->name('register');
Route::post('/post-registration', [UserAuthController::class, 'postRegistration'])->name('register.post');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserAuthController::class, 'dashboard'])->name('frontend.dashboard');
    Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');
    Route::get('/show-user-data', [UserAuthController::class, 'showUser'])->name('showUser');
    Route::post('/update-profile', [UserAuthController::class, 'updateProfile'])->name('updateProfile');
});



// Route::get('/forgot-password', [UserResetPasswordController::class, 'resetForm'])->name('password.request');
// Route::post('/forgot-password', [UserResetPasswordController::class, 'sendLink'])->name('password.email');
// Route::get('/reset-password/{token}', [UserResetPasswordController::class, 'resetPassword'])->name('password.reset');
// Route::post('/reset-password', [UserResetPasswordController::class, 'passwordUpdate'])->name('password.update');








//Backend Route Here
Route::middleware('admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/admin-logout', [AdminAuthController::class, 'adminLogout'])->name('admin.logout');


        Route::post('dashboard/quiz-topic/delete', [QuizTopicController::class, 'quizTopicDelete'])->name('dashboard.quiz-topic.delete');
        Route::get('/dashboard/manage-quiz-topic', [QuizTopicController::class, 'QuizTopicindex'])->name('dashboard.quiz.topic');
        Route::post('/dashboard/quiz-topic/add-edit', [QuizTopicController::class, 'QuizTopicstore'])->name('dashboard.quiz.topic.addedit');
        Route::get('/dashboard/quiz-topic/{id?}', [QuizTopicController::class, 'QuizTopicEdit'])->name('dashboard.quiz.topic.edit');


        Route::get('/dashboard/manage-quiz', [QuizController::class, 'Quizindex'])->name('dashboard.quiz');
        Route::post('/dashboard/quiz-store', [QuizController::class, 'QuizStore'])->name('dashboard.quizStore');
        Route::get('/dashboard/quiz-edit/{id?}', [QuizController::class, 'QuizEdit'])->name('dashboard.quizEdit');
        Route::post('/dashboard/quiz/delete', [QuizController::class, 'quizDelete'])->name('dashboard.quizDelete');


        Route::get('/dashboard/quiz-question', [QuizQuestionController::class, 'QuizQuestionIndex'])->name('dashboard.quiz.question');
        Route::post('/dashboard/quiz-question-store', [QuizQuestionController::class, 'QuizQuestionStore'])->name('dashboard.quizQuestionStore');
        Route::get('/dashboard/quiz-question-edit/{id?}', [QuizQuestionController::class, 'QuizQuestionEdit'])->name('dashboard.quizQuestionEdit');
        Route::post('/dashboard/quiz-question-delete', [QuizQuestionController::class, 'QuizQuestionDelete'])->name('dashboard.quizQuestionDelete');
    });
});




Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin.login.show');
    Route::post('/login-post', [AdminAuthController::class, 'loginPost'])->name('admin.login.post');
    Route::get('/register', [AdminAuthController::class, 'register'])->name('admin.register');
    Route::post('/register-post', [AdminAuthController::class, 'registrationPost'])->name('admin.register.post');
    Route::get('/dashboard/profile', [AdminController::class, 'adminProfile'])->name('dashboard.adminProfile');

    Route::get('/dashboard/profile/update', [AdminController::class, 'adminProfileUpdateForm'])->name('dashboard.adminProfile.updateForm');
    Route::post('/dashboard/profile/update', [AdminProfileUpdateController::class, 'adminProfileUpdate'])->name('dashboard.adminProfile.update');


    Route::get('/dashboard/password/update', [AdminController::class, 'adminPasswordUpdateForm'])->name('dashboard.adminPassword.updateForm');
    Route::post('/dashboard/password/update', [AdminPasswordUpdateController::class, 'adminPasswordUpdate'])->name('dashboard.adminPassword.update');
    
    Route::get('/dashboard/forgot-password', [AdminPasswordResetController::class, 'showForgetPasswordForm'])->name('admin.password.get');
    Route::post('/dashboard/forgot-password', [AdminPasswordResetController::class, 'submitForgetPasswordForm'])->name('admin.password.post');
    Route::get('/dashboard/reset-password/{token}', [AdminPasswordResetController::class, 'showResetPasswordForm'])->name('admin.password.reset.get');
    Route::post('/dashboard/reset-password', [AdminPasswordResetController::class, 'submitResetPasswordForm'])->name('admin.reset.password.update');
});



// Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
// Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');