<?php

// 管理后台
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', function () {
        return "this is login";
    });
});