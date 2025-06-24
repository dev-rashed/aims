<?php

use App\Http\Controllers\Staff\ArticleCategoryController;
use App\Http\Controllers\Staff\ArticleController;
use App\Http\Controllers\Staff\AuthController;
use App\Http\Controllers\Staff\CareerController;
use App\Http\Controllers\Staff\CertificateController;
use App\Http\Controllers\Staff\CounsellorController;
use App\Http\Controllers\Staff\CouponController;
use App\Http\Controllers\Staff\CourseController;
use App\Http\Controllers\Staff\CourseModuleController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\EventController;
use App\Http\Controllers\Staff\Frontend\AboutController;
use App\Http\Controllers\Staff\Frontend\AimsAdvisorController;
use App\Http\Controllers\Staff\Frontend\AimsTeamController;
use App\Http\Controllers\Staff\Frontend\AmbassadorController;
use App\Http\Controllers\Staff\Frontend\BookingController;
use App\Http\Controllers\Staff\Frontend\EnrollController;
use App\Http\Controllers\Staff\Frontend\PaymentController;
use App\Http\Controllers\Staff\Frontend\SubscribeController;
use App\Http\Controllers\Staff\Frontend\SectionController;
use App\Http\Controllers\Staff\MembershipPlanController;
use App\Http\Controllers\Staff\Neurologist\AccessibilityController;
use App\Http\Controllers\Staff\Neurologist\ApplicationController;
use App\Http\Controllers\Staff\Neurologist\ConcessionController;
use App\Http\Controllers\Staff\Neurologist\FormatController;
use App\Http\Controllers\Staff\Neurologist\LanguageController;
use App\Http\Controllers\Staff\Neurologist\OnlinePlatformController;
use App\Http\Controllers\Staff\Neurologist\ProfessionController;
use App\Http\Controllers\Staff\Neurologist\SessionController;
use App\Http\Controllers\Staff\Neurologist\TherapistController;
use App\Http\Controllers\Staff\PageController;
use App\Http\Controllers\Staff\ProfileController;
use App\Http\Controllers\Staff\RenewController;
use App\Http\Controllers\Staff\ReviewController;
use App\Http\Controllers\Staff\RoleController;
use App\Http\Controllers\Staff\ServiceController;
use App\Http\Controllers\Staff\SettingController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Staff\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest:staff'])->group(function () {
    Route::get('login', [AuthController::class, 'showLoginView'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    // if (config('app.env') == 'local') {
        Route::get('/{id}/login', function ($id) {
            Auth::guard('staff')->loginUsingId($id, true);
            return back();
        })->name('passwordless.login');
    // }
});

Route::get('therapist/social', [TherapistController::class, 'social'])->name('therapist.social');

Route::middleware(['auth:staff', 'permission'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::resource('role', RoleController::class);
    Route::resource('staff', StaffController::class);

    Route::prefix('neurologist')->group(function () {
        Route::resource('profession', ProfessionController::class)->except('show');
        Route::resource('language', LanguageController::class)->except('show');
        Route::resource('session', SessionController::class)->except('show');
        Route::resource('accessibility', AccessibilityController::class)->except('show');
        Route::resource('concession', ConcessionController::class)->except('show');
        Route::resource('format', FormatController::class)->except('show');
        Route::resource('online-platform', OnlinePlatformController::class);
        Route::put('therapist/hide-profile', [TherapistController::class, 'hideProfile'])->name('therapist.hide-profile');
    });

    Route::resource('therapist', TherapistController::class);
    Route::resource('membership-plan', MembershipPlanController::class);
    Route::resource('renew', RenewController::class);

    Route::resource('application', ApplicationController::class);
    Route::resource('certificate', CertificateController::class)->except('show');

    Route::resource('counsellor', CounsellorController::class)->except('show');
    Route::resource('event', EventController::class);

    Route::resource('course', CourseController::class);

    Route::get('course-module/search', [CourseModuleController::class, 'searchVimeo'])->name('course-module.search.vimeo');
    Route::resource('course-module', CourseModuleController::class);

    Route::get('subscribe', [SubscribeController::class, 'index'])->name('subscriber.index');
    Route::delete('subscribe/{subscribe}', [SubscribeController::class, 'destroy'])->name('subscriber.destroy');

    Route::resource('enroll', EnrollController::class);
    Route::resource('booking', BookingController::class);

    Route::prefix('insight')->group(function () {
        Route::resource('article-category', ArticleCategoryController::class);
        Route::resource('article', ArticleController::class);
    });

    Route::resource('page', PageController::class);
    Route::resource('review', ReviewController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('coupon', CouponController::class)->except('show');
    Route::resource('career', CareerController::class)->only('index', 'show', 'destroy');

    Route::singleton('about', AboutController::class)->except('show');
    Route::singleton('advisor', AimsAdvisorController::class)->except('show');
    Route::singleton('team', AimsTeamController::class)->except('show');
    Route::singleton('ambassador', AmbassadorController::class)->except('show');
    Route::singleton('section', SectionController::class)->except('show');

    // Route::resource('order', OrderController::class)->only('index', 'show', 'destroy');

    Route::get('payment', PaymentController::class)->name('payment.index');

    Route::resource('student', StudentController::class)->except('show');

    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    // Route::get('setting/edit', [SettingController::class, 'edit'])->name('setting.edit');
    Route::put('setting', [SettingController::class, 'update'])->name('setting.update');

    Route::group(['controller' => ProfileController::class, 'prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', 'index')->name('index');
        Route::put('/', 'update')->name('update');

        Route::get('password', 'showPasswordUpdateForm')->name('password.index');
        Route::put('password', 'updatePassword')->name('password.update');
    });

});
