<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/check-db', function () {
    return DB::table('users')->get();
});

Route::get('/check-db', function () {
    return DB::table('Clients')->get();
});
Route::get('/check-db', function () {
    return DB::table('Lawyers')->get();
});
Route::get('/check-db', function () {
    return DB::table('Availability')->get();
});
Route::get('/check-db', function () {
    return DB::table('Availability_Logs')->get();
});
Route::get('/check-db', function () {
    return DB::table('Chattings')->get();
});
Route::get('/check-db', function () {
    return DB::table('Chatting_Log')->get();
});
Route::get('/check-db', function () {
    return DB::table('Consultations')->get();
});
Route::get('/check-db', function () {
    return DB::table('Consultation_Notifications')->get();
});
Route::get('/check-db', function () {
    return DB::table('Documents')->get();
});
Route::get('/check-db', function () {
    return DB::table('ExternalSystem')->get();
});
Route::get('/check-db', function () {
    return DB::table('Notifications')->get();
});
Route::get('/check-db', function () {
    return DB::table('Settings')->get();
});
Route::get('/check-db', function () {
    return DB::table('UserProfile')->get();
});
Route::get('/check-db', function () {
    return DB::table('UserLogs')->get();
});
Route::get('/check-db', function () {
    return DB::table('Authentication')->get();
});