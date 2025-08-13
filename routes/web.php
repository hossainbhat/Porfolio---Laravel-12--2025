<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;


Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/portfolio', [IndexController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::match(['get','post'],'/blog', [IndexController::class, 'blog'])->name('blog');
Route::get('/blog/{blog}', [IndexController::class, 'blogSingle'])->name('blog.show');

Auth::routes(['register'=> false]);



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('blogs', BlogController::class);
    Route::resource('education', EducationController::class)->except(['show']);
    Route::resource('experiences', ExperienceController::class)->except(['show']);
    Route::resource('projects', ProjectController::class);
    Route::resource('skills', SkillController::class)->except(['show']);
    Route::get('contact', [SettingController::class, 'index'])->name('contact.index');
    Route::delete('contact/{contact}', [SettingController::class, 'destroy'])->name('contact.destroy');
    Route::match(['get','post'],'settings', [SettingController::class, 'settings'])->name('settings');
    Route::match(['get','post'],'profile', [SettingController::class, 'profile'])->name('profile');

});
