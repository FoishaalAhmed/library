<?php
Route::group(['prefix' => '/user', 'namespace' => 'User', 'middleware' => ['user', 'auth']], function () { 

    route::get('/dashboard', 'DashboardController@index')->name('user.dashboard');
    route::get('/profile', 'DashboardController@profile')->name('user.profile');
    route::get('/books', 'DashboardController@books')->name('user.books');
    route::post('/rating', 'DashboardController@give_rating')->name('give.rating');
    route::get('/rating/{book_id}/{book_name}', 'DashboardController@ratings')->name('user.rating');

});