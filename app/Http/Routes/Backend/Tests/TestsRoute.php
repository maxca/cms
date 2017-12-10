<?php
Route::group(['prefix' => 'tests', 'as' => 'tests.', 'namespace' => 'Tests'], function () {
    Route::get('list', 'TestsController@getTestslist')->name('view');
    Route::get('create', 'TestsController@getFormTestsCreate')->name('create');
    Route::post('create', 'TestsController@submitFormTestsCreate')->name('submit.create');
    Route::get('update', 'TestsController@getFormTestsUpdate')->name('update');
    Route::post('update', 'TestsController@submitFormTestsUpdate')->name('submit.update');
    Route::delete('delete', 'TestsController@submitFormTestsDelete')->name('submit.delete');

});
