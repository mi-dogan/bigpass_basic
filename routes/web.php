<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Back\ActivityController;
use App\Http\Controllers\Back\BranchController;
use App\Http\Controllers\Back\CalendarController;
use App\Http\Controllers\Back\CardErrorController;
use App\Http\Controllers\Back\CityController;
use App\Http\Controllers\Back\ConsentController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\DepartmentController;
use App\Http\Controllers\Back\DeviceController;
use App\Http\Controllers\Back\EmployeeController;
use App\Http\Controllers\Back\HolidayController;
use App\Http\Controllers\Back\PositionController;
use App\Http\Controllers\Back\ProfileController;
use App\Http\Controllers\Back\QrcodeController;
use App\Http\Controllers\Back\ShiftController;
use App\Http\Controllers\Back\ShiftDayController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\CompanysController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest:web')->group(function () {
    Route::get('/giris', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/giris', [AuthenticatedSessionController::class, 'store']);
    //Route::get('kaydol', [RegisterController::class, 'create'])->name('register');
    //Route::post('kaydol', [RegisterController::class, 'store']);
    Route::get('/sifremi-unuttum', [ResetPasswordController::class, 'forgot'])->name('forgot');
    Route::post('/sifremi-unuttum', [ResetPasswordController::class, 'forgot_post']);
    Route::get('/sifreyi-sifirla/{token}', [ResetPasswordController::class, 'reset_request'])->name('password.reset');
    Route::post('/sifreyi-sifirla', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('/sifreyi/dogrula/{email}', [ResetPasswordController::class, 'password_send'])->name('password.send');
});

Route::middleware(['auth', 'unverified'])->prefix('admin')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');

    Route::middleware(['verified'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::post('district', [CityController::class, 'district'])->name('district');

        Route::resource('companys', CompanysController::class);
        Route::put('companys/{id}', [CompanysController::class, 'update'])->name('companys.update');
        Route::get('companys/{id}/delete', [CompanysController::class, 'destroy'])->name('companys.destroy');
        Route::post('companys/{id}/updateCompanyId', [CompanysController::class, 'updateCompanyId'])->name('companys.updateCompanyId');

        Route::resource('departmanlar', DepartmentController::class);
        Route::get('departmanlar/{id}/delete', [DepartmentController::class, 'destroy'])->name('departmanlar.delete');
        Route::get('departmanlar/show', [DepartmentController::class, 'show'])->name('departmanlar.show');

        Route::resource('subeler', BranchController::class);
        Route::get('subeler/{id}/delete', [BranchController::class, 'destroy'])->name('subeler.delete');
        Route::get('subeler/show', [BranchController::class, 'show'])->name('subeler.show');


        Route::resource('calisanlar', EmployeeController::class);
        Route::get('calisanlar/all/{id}', [EmployeeController::class, 'employees'])->name('employees');
        Route::get('calisanlar/{id}/delete', [EmployeeController::class, 'destroy'])->name('calisanlar.delete');

        Route::resource('kullanicilar', UserController::class);
        Route::get('kullanicilar/{id}/delete', [UserController::class, 'destroy'])->name('kullanicilar.delete');

        Route::resource('pozisyonlar', PositionController::class);
        Route::get('pozisyonlar/{id}/delete', [PositionController::class, 'destroy'])->name('pozisyonlar.delete');
        Route::get('pozisyonlar/show', [PositionController::class, 'show'])->name('pozisyonlar.show');


        Route::resource('tatiller', HolidayController::class);
        Route::get('tatiller/{id}/delete', [HolidayController::class, 'destroy'])->name('tatiller.delete');

        Route::resource('vardiyalar', ShiftController::class);
        Route::put('vardiyalar/{id}/calisan', [ShiftController::class, 'employee'])->name('vardiyalar.employee');
        Route::get('vardiyalar/{id}/delete', [ShiftController::class, 'destroy'])->name('vardiyalar.delete');
        Route::get('vardiyalar/show', [ShiftController::class, 'show'])->name('vardiyalar.show');


        Route::resource('vardiyalar/{id}/gunler', ShiftDayController::class);
        Route::get('vardiyalar/{id}/gunler/{gunler}/delete', [ShiftDayController::class, 'destroy'])->name('gunler.delete');

        Route::resource('izinler', ConsentController::class);
        Route::get('izinler/{id}/delete', [ConsentController::class, 'destroy'])->name('izinler.delete');

        Route::resource('cihazlar', DeviceController::class);
        Route::get('cihazlar/{id}/delete', [DeviceController::class, 'destroy'])->name('cihazlar.delete');

        Route::resource('hata-listesi', CardErrorController::class);

        Route::get('qr-code/{qrCode}/get', [QrcodeController::class, 'show'])->name('qr-code.show');
        Route::post('qr-code/generate', [QrcodeController::class, 'generate'])->name('qr-code.generate');

        Route::resource('raporlar', ActivityController::class);

        Route::resource('takvim', CalendarController::class);

        Route::get('profilim', [ProfileController::class, 'create'])->name('profile');
        Route::put('profilim', [ProfileController::class, 'profile_update'])->name('profile.update');
        Route::put('profilim/email', [ProfileController::class, 'email_update'])->name('profile.email');
        Route::put('profilim/password', [ProfileController::class, 'password_update'])->name('profile.password');
    });
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::prefix("qr")->name("qr.")->group(function () {
    Route::middleware('guest:employee')->group(function () {
        Route::get('/giris', [\App\Http\Controllers\AuthEmployee\EmployeeLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/giris', [\App\Http\Controllers\AuthEmployee\EmployeeLoginController::class, 'login']);
    });

    Route::middleware('auth:employee')->group(function () {
        Route::get('/', [QrcodeController::class, 'showQrPage'])->name('home');
        Route::get('/{qrCode}/show', [QrcodeController::class, 'showQrPage'])->name('show');
        //        Route::get('/{deviceCode}', [QrcodeController::class, 'showQrPage'])->name('show');
    });
    Route::get('/cikis', [\App\Http\Controllers\AuthEmployee\EmployeeLoginController::class, 'logout'])->name('logout');
});

Route::get('random-qr/{deviceCode}', [QrcodeController::class, 'show'])->name('randomQrShow');
