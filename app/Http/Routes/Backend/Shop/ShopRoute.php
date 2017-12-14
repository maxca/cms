<?php
Route::group(['prefix' => 'shop', 'as' => 'shop.', 'namespace' => 'Shop'], function () {
    Route::get('list', 'ShopController@getShoplist')->name('view');
    Route::get('create', 'ShopController@getFormShopCreate')->name('create');
    Route::get('detail', 'ShopController@getShopDetail')->name('detail');
    Route::post('create', 'ShopController@submitFormShopCreate')->name('submit.create');
    Route::get('update', 'ShopController@getFormShopUpdate')->name('update');
    Route::post('update', 'ShopController@submitFormShopUpdate')->name('submit.update');
    Route::delete('delete', 'ShopController@submitFormShopDelete')->name('submit.delete');

});
