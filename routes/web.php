<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\JobApplicaionsController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
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

Route::controller(HomeController::class)->group(function () {
    // here Other pages like about contact testimonial etc come
    Route::get("/", 'IndexPage');
    Route::get("/index.html", 'IndexPage');
    Route::get("/about.html", 'AboutPage');
    Route::get("/404.html", 'ErrorPage');
    Route::get("/testimonial.html", 'TestimonialPage');
    Route::get("/contact.html", 'ContactUsPage');
});
Route::controller(JobsController::class)->group(function () {
    // can be used To Perform CRUD in  jobs table
    
    Route::get('/job-list.html', 'JobListPage');
    Route::get('/job-detail.html/{id}', 'JobDetailsPage')->whereNumber("id");
    Route::get('/category.html', 'JobCategoryPage');

});
Route::controller(JobApplicaionsController::class)->group(function (){
    // used To Perform CRUD in  job_applications table

    // User ApplyForJob
    Route::post("/UserApplyForJob",'UserApplyForJob');
});

Route::controller(UsersController::class)->group(function (){
    // here User crud like login signup confirm paass,delete user etc come

});