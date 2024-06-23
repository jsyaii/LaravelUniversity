<?php

use App\Http\Controllers\Search;
use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view("home");
});

Route::get("/about", function () {
    return view("about");
});

Route::get('/home', function () {
    return view("home");
});


Route::get('/search', [Search::class, "showRecords"]);
Route::post('/search', [Search::class, 'searchRecords'])->name('search.records');
Route::get('/manage', [Users::class, "show_users"]);
Route::post('/manage/editName/{id}', [Users::class, "changeName2"]);
Route::get('/manage/deleteRecord/{id}', [Users::class, "deleteRecord"]);
Route::get('manage/showForm', [Users::class, "show_form"]);
Route::get('/manage/editName/{id}', [Users::class, "show_edit_form"]);
Route::post('/manage/create', [Users::class, "createRecord"]);