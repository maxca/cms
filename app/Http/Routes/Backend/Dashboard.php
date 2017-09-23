<?php

Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function () {
    Route::get('transaction', 'MainBackendController@index')->name('list');

});
