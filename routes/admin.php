<?php
Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'middleware' => ['admin', 'auth']], function () {

    Route::resources([

        'backgrounds'    => 'AuthorBackgroundController',
        'users'          => 'UserController',
        'authors'        => 'AuthorController',
        'administrators' => 'AdministratorController',
        'categories'     => 'CategoryController',
        'pages'          => 'PageController',
        'notices'        => 'NoticeController',
        'books'          => 'BookController',
        'sliders'        => 'SliderController',
        'galleries'      => 'GalleryController',
        'tables'         => 'CoffeeTableController',
    ]);

    Route::get('/stocks', 'StockController@index')->name('stocks.index');
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::put('/contact/update/{id}', 'ContactController@update')->name('contact.update');
    Route::get('/queries', 'QueryController@index')->name('queries.index');
    Route::get('/queries/show/{id}', 'QueryController@show')->name('queries.show');
    Route::delete('/queries/destroy/{id}', 'QueryController@destroy')->name('queries.destroy');

    /** Book Borrow Route Start **/
    Route::get('/borrows', 'BorrowBookController@index')->name('borrows.index');
    Route::get('/borrows/{id}/id/{status}/status', 'BorrowBookController@status')->name('borrows.status');
    /** Book Borrow Route End **/

    /** Table Books Route Start **/
    Route::get('/book-table', 'BookTableController@index')->name('booking.index');
    Route::get('/book-table/{id}/id/{status}/status', 'BookTableController@status')->name('booking.status');
    /** Table Books Route End **/
});
