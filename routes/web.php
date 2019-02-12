<?php

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

Route::get('/', 'PagesController@index');
Route::get('/aboutus', 'PagesController@aboutus');

//route for VacancyController
Route::resource('vacancy','VacancyController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

//routes for hndling applicant and controllers
Route::resource('admin','AdminController');
Route::resource('applicant','ApplicantController');

//route for handling candidates
Route::resource('candidate','CandidateController');
