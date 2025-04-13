<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TempleController;
use App\Http\Controllers\Superadmin\TempleController as SuperadminTempleController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanchangController;
use App\Http\Controllers\PujaController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\ScriptureController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MeditationController;
use App\Http\Controllers\DailyWisdomController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/panchang', [PanchangController::class, 'publicIndex'])->name('panchang');

// Public Temple Routes
Route::get('/temples', [TempleController::class, 'publicIndex'])->name('temples.index');
Route::get('/temples/featured', [TempleController::class, 'featured'])->name('temples.featured');
Route::get('/temples/city/{city}', [TempleController::class, 'byCity'])->name('temples.byCity');
Route::get('/temples/state/{state}', [TempleController::class, 'byState'])->name('temples.byState');
Route::get('/temples/deity/{deity}', [TempleController::class, 'byDeity'])->name('temples.byDeity');
Route::get('/temples/{temple}', [TempleController::class, 'show'])->name('temples.show');

Route::get('/pujas', [PujaController::class, 'publicIndex'])->name('pujas');

// Public Festival Routes
Route::get('/festivals', [FestivalController::class, 'publicIndex'])->name('festivals');
Route::get('/festivals/featured', [FestivalController::class, 'featured'])->name('festivals.featured');
Route::get('/festivals/upcoming', [FestivalController::class, 'upcoming'])->name('festivals.upcoming');
Route::get('/festivals/deity/{deity}', [FestivalController::class, 'byDeity'])->name('festivals.byDeity');
Route::get('/festivals/{festival}', [FestivalController::class, 'show'])->name('festivals.show');

// Public Scripture Routes
Route::get('/scriptures', [ScriptureController::class, 'publicIndex'])->name('scriptures.index');
Route::get('/scriptures/featured', [ScriptureController::class, 'featured'])->name('scriptures.featured');
Route::get('/scriptures/category/{category}', [ScriptureController::class, 'byCategory'])->name('scriptures.byCategory');
Route::get('/scriptures/language/{language}', [ScriptureController::class, 'byLanguage'])->name('scriptures.byLanguage');
Route::get('/scriptures/{scripture}', [ScriptureController::class, 'show'])->name('scriptures.show');
Route::get('/scriptures/{scripture}/read', [ScriptureController::class, 'read'])->name('scriptures.read');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified', 'premium'])->group(function () {
    Route::get('/premium/features', function () {
        return view('premium.features');
    })->name('premium.features');
});

// Temple Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/temples/create', [TempleController::class, 'create'])->name('temples.create');
    Route::post('/temples', [TempleController::class, 'store'])->name('temples.store');
    Route::get('/temples/{temple}/edit', [TempleController::class, 'edit'])->name('temples.edit');
    Route::put('/temples/{temple}', [TempleController::class, 'update'])->name('temples.update');
    Route::delete('/temples/{temple}', [TempleController::class, 'destroy'])->name('temples.destroy');
});

// Regular Puja Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/pujas/list', [PujaController::class, 'index'])->name('pujas.index');
    Route::get('/pujas/featured/list', [PujaController::class, 'featured'])->name('pujas.featured');
    Route::get('/pujas/view/{puja}', [PujaController::class, 'show'])->name('pujas.show');
    Route::get('/pujas/category/{category}', [PujaController::class, 'category'])->name('pujas.category');
});

// Public Meditation Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/meditations/list', [MeditationController::class, 'index'])->name('meditations.index');
    Route::get('/meditations/featured', [MeditationController::class, 'featured'])->name('meditations.featured');
    Route::get('/meditations/view/{meditation}', [MeditationController::class, 'show'])->name('meditations.show');
    Route::get('/meditations/category/{category}', [MeditationController::class, 'byCategory'])->name('meditations.byCategory');
    Route::get('/meditations/difficulty/{level}', [MeditationController::class, 'byDifficulty'])->name('meditations.byDifficulty');
});

// Public Blog Routes
Route::get('/blogs', [BlogController::class, 'publicIndex'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

// Public Panchang Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/panchang/list', [PanchangController::class, 'index'])->name('panchang.index');
    Route::get('/panchang/today', [PanchangController::class, 'today'])->name('panchang.today');
    Route::get('/panchang/date/{date}', [PanchangController::class, 'byDate'])->name('panchang.byDate');
    Route::get('/panchang/month/{month}', [PanchangController::class, 'byMonth'])->name('panchang.byMonth');
    Route::get('/panchang/year/{year}', [PanchangController::class, 'byYear'])->name('panchang.byYear');
});

// SuperAdmin Routes
Route::middleware(['auth', 'superadmin'])->prefix('superadmin')->name('superadmin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard');

    // Settings
    Route::get('/settings', [SuperAdminController::class, 'settings'])->name('settings');

    // Panchang Routes
    Route::resource('panchang', PanchangController::class);

    // Temple Routes
    Route::get('/temples', [SuperadminTempleController::class, 'index'])->name('temples.index');
    Route::get('/temples/create', [SuperadminTempleController::class, 'create'])->name('temples.create');
    Route::post('/temples', [SuperadminTempleController::class, 'store'])->name('temples.store');
    Route::get('/temples/{temple}', [SuperadminTempleController::class, 'show'])->name('temples.show');
    Route::get('/temples/{temple}/edit', [SuperadminTempleController::class, 'edit'])->name('temples.edit');
    Route::put('/temples/{temple}', [SuperadminTempleController::class, 'update'])->name('temples.update');
    Route::delete('/temples/{temple}', [SuperadminTempleController::class, 'destroy'])->name('temples.destroy');

    // Puja Routes
    Route::resource('pujas', PujaController::class);
    Route::get('/pujas/featured', [PujaController::class, 'featured'])->name('pujas.featured');

    // Festival Routes
    Route::get('/festivals', [FestivalController::class, 'index'])->name('festivals.index');
    Route::get('/festivals/create', [FestivalController::class, 'create'])->name('festivals.create');
    Route::post('/festivals', [FestivalController::class, 'store'])->name('festivals.store');
    Route::get('/festivals/{festival}', [FestivalController::class, 'show'])->name('festivals.show');
    Route::get('/festivals/{festival}/edit', [FestivalController::class, 'edit'])->name('festivals.edit');
    Route::put('/festivals/{festival}', [FestivalController::class, 'update'])->name('festivals.update');
    Route::delete('/festivals/{festival}', [FestivalController::class, 'destroy'])->name('festivals.destroy');

    // Scripture Routes
    Route::resource('scriptures', ScriptureController::class);

    // User Routes
    Route::resource('users', UserController::class);

    // Meditation Routes
    Route::resource('meditations', MeditationController::class);

    // Daily Wisdom Routes
    Route::resource('daily-wisdoms', DailyWisdomController::class);

    // Blog Routes - Full CRUD access for superadmin
    Route::resource('blogs', BlogController::class);
});

// CSV Import/Export Routes for Superadmin
Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/superadmin/temples/export-sample', [SuperadminTempleController::class, 'exportSampleCsv'])->name('superadmin.temples.export-sample');
    Route::post('/superadmin/temples/import', [SuperadminTempleController::class, 'importCsv'])->name('superadmin.temples.import');
});
