<?php

Route::get('/', function () {
    return view('welcome');
});

// instagram api example 相關檔案：
// app/Http/Controllers/InstagramController.php
// resources/views/instagram.blade.php
Route::get('instagram', 'InstagramController@index');
