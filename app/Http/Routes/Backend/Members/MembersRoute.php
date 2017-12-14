<?php
Route::group(['prefix' => 'members', 'as' => 'members.', 'namespace' => 'Members'], function () {
    Route::get('list', 'MembersController@getMemberslist')->name('view');
    Route::get('create', 'MembersController@getFormMembersCreate')->name('create');
    Route::get('detail', 'MembersController@getMembersDetail')->name('detail');
    Route::post('create', 'MembersController@submitFormMembersCreate')->name('submit.create');
    Route::get('update', 'MembersController@getFormMembersUpdate')->name('update');
    Route::post('update', 'MembersController@submitFormMembersUpdate')->name('submit.update');
    Route::delete('delete', 'MembersController@submitFormMembersDelete')->name('submit.delete');

});
