<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserDetailController;
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

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user-detail',UserDetailController::class)->middleware('auth');
Route::resource('education',EducationController::class)->middleware('auth');
Route::resource('experience',ExperienceController::class)->middleware('auth');
Route::resource('skills',SkillController::class)->middleware('auth');

Route::get('resume',[ResumeController::class, 'index'])->name('resume.index')->middleware('auth');
Route::get('resume/download',[ResumeController::class, 'download'])->name('resume.download')->middleware('auth');


