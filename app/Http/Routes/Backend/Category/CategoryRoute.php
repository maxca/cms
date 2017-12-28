<?php
Route::group(['prefix' => 'category', 'as' => 'category.', 'namespace' => 'Category'], function () {
    Route::get('list', 'CategoryController@getCategorylist')->name('view');
    Route::get('create/', 'CategoryController@getFormCategoryCreate')->name('create');
    Route::get('detail', 'CategoryController@getCategoryDetail')->name('detail');
    Route::post('create', 'CategoryController@submitFormCategoryCreate')->name('submit.create');
    Route::get('update', 'CategoryController@getFormCategoryUpdate')->name('update');
    Route::post('update', 'CategoryController@submitFormCategoryUpdate')->name('submit.update');
    Route::delete('delete', 'CategoryController@submitFormCategoryDelete')->name('submit.delete');

});
