<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\AdvisorController;
use App\Http\Controllers\Frontend\AmbassadorsController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\Auth\BookingController as AuthBookingController;
use App\Http\Controllers\Frontend\Auth\CertificateController;
use App\Http\Controllers\Frontend\Auth\CourseController as AuthCourseController;
use App\Http\Controllers\Frontend\Auth\DashboardController;
use App\Http\Controllers\Frontend\Auth\DirectoryProfileController;
use App\Http\Controllers\Frontend\Auth\MembershipController as AuthMembershipController;
use App\Http\Controllers\Frontend\Auth\PaymentController;
use App\Http\Controllers\Frontend\Auth\ProfileController;
use App\Http\Controllers\Frontend\Auth\VideoPaymentController;
use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CouponController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\CurrencyController;
use App\Http\Controllers\Frontend\DirectoryController;
use App\Http\Controllers\Frontend\EthicalController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MemberBenefitController;
use App\Http\Controllers\Frontend\MembershipController;
use App\Http\Controllers\Frontend\NeurologistController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PaymentController as FrontendPaymentController;
use App\Http\Controllers\Frontend\SocialAuthController;
use App\Http\Controllers\Frontend\SubscribeController;
use App\Http\Controllers\Frontend\TeamController;
use Illuminate\Support\Facades\Auth;
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

// if (config('app.env') == 'local') {
    Route::get('test', function () {
        return now()->createFromFormat('Y-m-d', '2024-02-03')->diffInMonths(now());
    });

    Route::get('/{id}/login', function ($id) {
        Auth::loginUsingId($id);
        return back();

    })->name('passwordless.login')->middleware('guest:web');
// }

Route::get('/', HomeController::class)->name('home');

Route::middleware(['guest:web'])->as('membership.')->prefix('membership')->controller(MembershipController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('check', 'check')->name('check');
    Route::get('/{slug}', 'show')->name('show');
});

Route::middleware(['guest:web'])->as('social.')->prefix('social')->controller(MembershipController::class)->group(function () {
    Route::get('{driver}/login', [SocialAuthController::class, 'index'])->name('login');
    Route::get('{driver}/callback', [SocialAuthController::class, 'handleCallback'])->name('login.callback');
});

Route::get('/payment/{status}', [FrontendPaymentController::class, 'callback'])->name('payment.callback');

Route::post('/coupon', CouponController::class)->name('coupon.store');

Route::as('directory.')->prefix('directory')->controller(DirectoryController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/filter', 'filter')->name('filter');
});

Route::as('neurologist.')->prefix('neurologist')->controller(NeurologistController::class)->group(function () {
    Route::get('bookmark', 'bookmarkData')->name('bookmark.data');
    Route::post('bookmark', 'bookmarkStore');
    Route::post('contact', 'contactStore')->name('contact')->middleware('auth');
    Route::get('{username}/bookmark', 'bookmark')->name('bookmark');
    Route::get('{username}', 'details')->name('details');
});
Route::get('members/{username}', [NeurologistController::class, 'details'])->name('neurologist.details');

Route::as('course.')->prefix('course')->controller(CourseController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'checkout')->name('checkout');
    Route::get('enroll/{slug}', 'enroll')->name('enroll');
    Route::get('{slug}', 'details')->name('details');
});

Route::as('event.')->prefix('event')->controller(EventController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'checkout')->name('checkout');
    Route::get('booking/{slug}', 'booking')->name('booking');
    Route::get('{slug}', 'details')->name('details');
});

Route::get('/about', AboutController::class)->name('about.index');
Route::get('/ethical-standards', EthicalController::class)->name('ethical.index');
Route::post('/subscribe', SubscribeController::class)->name('subscribe');

Route::get('/career', [CareerController::class, 'index'])->name('career.index');
Route::post('/career', [CareerController::class, 'store'])->name('career.store');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/insight', [ArticleController::class, 'index'])->name('article.index');
Route::get('/insight/{slug}', [ArticleController::class, 'details'])->name('article.details');

Route::get('/confirmation', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');

Route::group(['middleware' => ['auth'], 'prefix' => 'auth'], function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::group(['middleware' => ['practitioner']], function () {
        Route::get('certificate', CertificateController::class)->name('certificate.index');

        Route::resource('members', AuthMembershipController::class)->only('index', 'store');
        Route::get('/members/created/{type}', [AuthMembershipController::class, 'created'])->name('members.created');

        Route::get('payment', [PaymentController::class, 'index'])->name('payment.index');
        Route::get('payment/create', [PaymentController::class, 'create'])->name('payment.create');
        Route::post('payment', [PaymentController::class, 'store'])->name('payment.store');
        Route::post('video/payment', VideoPaymentController::class)->name('video.payment');

        Route::get('directory-profile', [DirectoryProfileController::class, 'index'])->name('directory.profile.index');
        Route::put('directory-profile', [DirectoryProfileController::class, 'update'])->name('directory.profile.update');
    });

    Route::group(['prefix' => 'course', 'as' => 'auth.course.'], function () {
        Route::get('/', [AuthCourseController::class, 'index'])->name('index');
        Route::get('/{slug}', [AuthCourseController::class, 'show'])->name('show');
    });
    Route::group(['prefix' => 'booking', 'as' => 'auth.booking.'], function () {
        Route::get('/', [AuthBookingController::class, 'index'])->name('index');
        Route::get('/{slug}', [AuthBookingController::class, 'show'])->name('show');
    });

    Route::group(['controller' => ProfileController::class, 'prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', 'index')->name('index');
        Route::put('/', 'update')->name('update');
        Route::put('/renew', 'updateRenewType')->name('renew.type');

        Route::get('password', 'showPasswordUpdateForm')->name('password.index');
        Route::put('password', 'updatePassword')->name('password.update');
    });
});

Route::get('/currency/{id}', CurrencyController::class)->name('currency.index');
Route::get('/team', TeamController::class)->name('team');
Route::get('/member-benefits', MemberBenefitController::class)->name('benefits');
Route::get('/aims-advisors', AdvisorController::class)->name('advisors');
Route::get('/ambassadors', AmbassadorsController::class)->name('ambassadors');
Route::get('/{slug}', [PageController::class, 'details'])->name('page.details');
