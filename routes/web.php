<?php

use App\Http\Controllers\AboutSectionTeams;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BotmanController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Frontend\Dashboard\DashboardController;
use App\Http\Controllers\Frontend\Dashboard\HomeDashboardController;
use App\Http\Controllers\Frontend\Dashboard\HomeEasySectionBackupController;
use App\Http\Controllers\Frontend\Dashboard\HomeHeroSectionBackupController;
use App\Http\Controllers\Frontend\Dashboard\HomeHeroSectionController;
use App\Http\Controllers\Dashboard\HomeEasyBookingController;
use App\Http\Controllers\Frontend\Dashboard\About\AboutCompanySectionController;
use App\Http\Controllers\Frontend\Dashboard\About\AboutHeroSection;
use App\Http\Controllers\Frontend\Dashboard\About\AboutTeamSectionController;
use App\Http\Controllers\Frontend\Dashboard\About\AboutTestimonySectionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\Frontend\Web\FEHomeController;
use App\Http\Controllers\Frontend\Web\FEProductController;
use App\Http\Controllers\Frontend\Web\FEBlogController;
use App\Http\Controllers\Frontend\Web\FEContactController;
use App\Http\Controllers\Frontend\Web\FEAboutController;

use App\Livewire\RoleManagement;




// Route::get('/', function () {
//     return view('welcome');
// });
  
Auth::routes();

// Frontend Website
Route::get('/',[FEHomeController::class, 'index'])->name('fe.home');
Route::get('/about',[FEAboutController::class, 'index'])->name('fe.about');
Route::get('/product',[FEProductController::class, 'index'])->name('fe.product');
Route::get('/blog',[FEBlogController::class, 'index'])->name('fe.blog');
Route::get('/contact',[FEContactController::class, 'index'])->name('fe.contact');
  
Route::get('/home', [HomeController::class, 'index'])->name('dashboard.home');
Route::get('/role-management', RoleManagement::class)->middleware('auth');

Route::group(['middleware' => ['auth']], function(){
    
});


Route::get('/management', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/botman', [BotmanController::class, 'handle']);

Route::group(['middleware' => ['auth'], 'as' => 'dashboard.'], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('product', ProductController::class);
    Route::resource('contact', ContactController::class );
    
    // Home Component CRUD Route Ressources
    Route::resource('web-home-dashboard', HomeDashboardController::class);
    Route::resource('home-hero-section', HomeHeroSectionController::class);
    Route::resource('home-easy-section', HomeEasySectionBackupController::class);

    // About Component CRUD Route Resources
    Route::resource('about_company_section', AboutCompanySectionController::class);
    Route::resource('about_hero_section', AboutHeroSection::class);

    Route::resource('about_testimoni_section', AboutTestimonySectionController::class);
    
});


