<?php
Route::group(['prefix' => 'shop', 'as' => 'shoppackage.', 'namespace' => 'ShopPackage'], function () {
    Route::get('package', 'ShopPackageController@getShopPackagelist')->name('view');
    Route::get('package/create', 'ShopPackageController@getFormShopPackageCreate')->name('create');
    Route::get('package/detail', 'ShopPackageController@getShopPackageDetail')->name('detail');
    Route::post('package/create', 'ShopPackageController@submitFormShopPackageCreate')->name('submit.create');
    Route::get('package/update', 'ShopPackageController@getFormShopPackageUpdate')->name('update');
    Route::post('package/update', 'ShopPackageController@submitFormShopPackageUpdate')->name('submit.update');
    Route::delete('package/delete', 'ShopPackageController@submitFormShopPackageDelete')->name('submit.delete');

});
