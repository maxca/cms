<?php

Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function () {
    Route::get('transaction', 'MainBackendController@index')->name('list');
    Route::get('member', 'MainBackendController@getMemberList')->name('lisst');
    Route::get('create', 'MainBackendController@getFormCreate');
    Route::post('create', 'MainBackendController@submitFormCreate')->name('create');
    Route::get('update', 'MainBackendController@getFormUpdate');
    Route::post('update', 'MainBackendController@submitFormUpdate')->name('update');
    Route::delete('delete', 'MainBackendController@submitFormDelete')->name('delete');

});
