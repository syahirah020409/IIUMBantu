<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestHelpController;
use App\Http\Controllers\OfferHelpController;
use App\Http\Controllers\CollabDonationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');


// Define the dashboard routes for admin and treasurer and donator
Route::middleware(['auth', 'verified'])->group(function () {

    // admin route
    Route::get('/admin/landing', [HomeController::class, 'admin_landing'])->name('admin.landing');
    Route::get('/admin/dashboard', [HomeController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::get('/admin/request_list', [RequestHelpController::class, 'admin_request_list'])->name('admin.request_list');
    Route::get('/admin/view_request_details/{id}', [RequestHelpController::class, 'admin_view_request_details'])->name('admin.view_request_details');
    Route::post('/admin/update_request_status', [RequestHelpController::class, 'admin_update_request_status'])->name('admin.update_request_status');
    Route::get('/admin/offer_list', [OfferHelpController::class, 'admin_offer_list'])->name('admin.offer_list');
    Route::post('/admin/update_offer_status', [OfferHelpController::class, 'admin_update_offer_status'])->name('admin.update_offer_status');
    Route::get('/admin/donation_list', [CollabDonationController::class, 'admin_donation_list'])->name('admin.donation_list');
    Route::get('/admin/view_collab_details/{id}', [CollabDonationController::class, 'admin_view_collab_details'])->name('admin.view_collab_details');
    Route::post('/admin/update_collab_status', [CollabDonationController::class, 'admin_update_collab_status'])->name('admin.update_collab_status');
    Route::get('/admin/registered_user_list', [HomeController::class, 'admin_registered_user_list'])->name('admin.registered_user_list');

    // user route
    Route::get('/user/landing', [HomeController::class, 'user_landing'])->name('user.landing');
    Route::get('/user/dashboard', [HomeController::class, 'user_dashboard'])->name('user.dashboard');
    Route::get('/user/about-us', [HomeController::class, 'user_about_us'])->name('user.about_us');
    Route::get('/user/map', [HomeController::class, 'user_map'])->name('user.map');
    Route::get('/user/browse-request', [RequestHelpController::class, 'user_browse_request'])->name('user.browse_request');
    Route::get('/user/donation', [CollabDonationController::class, 'user_donation_list'])->name('user.donation');
    Route::get('/user/collaboration_form', [CollabDonationController::class, 'create'])->name('user.collaboration_form');
    Route::get('/user/collab_donation_details/{id}', [CollabDonationController::class, 'user_collab_donation_details'])->name('user.collab_donation_details');
    Route::post('/user/submit_collab_donation', [CollabDonationController::class, 'store'])->name('user.submit_collab_donation');
    Route::get('/user/request_help', [HomeController::class, 'user_request_help'])->name('user.request_help');
    Route::get('/user/request_help_category/{category}', [RequestHelpController::class, 'user_request_help_category'])->name('user.request_help_category');
    Route::post('/user/submit_request_help', [RequestHelpController::class, 'store'])->name('user.submit_request_help');
    Route::post('/user/cancel_request_help', [RequestHelpController::class, 'user_cancel_request_help'])->name('user.cancel_request_help');
    Route::get('/user/request_submitted', [RequestHelpController::class, 'user_request_submitted'])->name('user.request_submitted');
    Route::get('/user/offer_help/{id}', [OfferHelpController::class, 'user_offer_help'])->name('user.offer_help');
    Route::get('/user/offer_help_type/{type}/{id}', [OfferHelpController::class, 'user_offer_help_type'])->name('user.offer_help_type');
    Route::post('/user/submit_send_help', [OfferHelpController::class, 'store'])->name('user.submit_send_help');
    Route::get('/user/offer_submitted', [OfferHelpController::class, 'user_offer_submitted'])->name('user.offer_submitted');
    Route::get('/user/main_listing', [OfferHelpController::class, 'user_main_listing'])->name('user.main_listing');

    // lookup
    Route::get('/find_full_address', [RequestHelpController::class, 'find_full_address'])->name('find_full_address');
    Route::get('/get_approved_request', [RequestHelpController::class, 'get_approved_request'])->name('get_approved_request');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile_view', [ProfileController::class, 'view_profile'])->name('profile.view');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/new_profile_update', [ProfileController::class, 'new_profile_update'])->name('profile.new_profile_update');
    Route::get('/change_password', [ProfileController::class, 'user_change_password'])->name('profile.user_change_password');
});

require __DIR__.'/auth.php';
