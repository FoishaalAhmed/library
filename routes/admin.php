<?php
Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'middleware' => ['admin', 'auth']], function () {

    Route::resources([

        'users'          => 'UserController',
        'authors'        => 'AuthorController',
        'administrators' => 'AdministratorController',
        'categories'     => 'CategoryController',
        'pages'          => 'PageController',
        'notices'        => 'NoticeController',
        'books'          => 'BookController',
        'sliders'        => 'SliderController',
        'galleries'      => 'GalleryController',
    ]);

    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::put('/contact/update/{id}', 'ContactController@update')->name('contact.update');
    Route::get('/queries', 'QueryController@index')->name('queries.index');
    Route::get('/queries/show/{id}', 'QueryController@show')->name('queries.show');
    Route::delete('/queries/destroy/{id}', 'QueryController@destroy')->name('queries.destroy');
});
