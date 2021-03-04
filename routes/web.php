<?php

    Auth::routes();

    Route::group( ['namespace' => 'Frontend'], function () {
        
        Route::get('/', 'HomeController@index');
        Route::get('/support', 'HomeController@support')->name('support');
        Route::get('/administrator', 'HomeController@administrator')->name('administrator');
        Route::get('/author', 'HomeController@author')->name('author');
        Route::get('/video-gallery', 'HomeController@video')->name('video');
        Route::get('/photo-gallery', 'HomeController@photo')->name('photo');
        Route::get('/contact', 'ContactController@index')->name('front.contact');
        Route::get('/top-member', 'ContactController@member')->name('top.member');
        Route::get('/search', 'ContactController@search')->name('search');
        Route::post('/query', 'ContactController@query')->name('send.query');
        Route::get('/book', 'BookController@index')->name('book');
        Route::post('/book-filter', 'BookController@filter')->name('filter.books');
        Route::get('/education-book', 'BookController@education')->name('education');
        Route::get('/book/{id}/{name}', 'BookController@detail')->name('book.detail');
        Route::get('/news-detail/{id}/{title}', 'BookController@notice_details')->name('notice.detail');
        Route::get('/author-books/{id}/{name}', 'BookController@author_books')->name('author.books');
        Route::post('/book-borrow', 'BookController@borrow')->name('book.borrow');

        Route::get('/coffee-table', 'CoffeeTableController@index')->name('coffee.index');
        Route::post('/coffee-table', 'CoffeeTableController@coffee')->name('coffee.book');
        Route::post('/send-support', 'CoffeeTableController@support')->name('send.support');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    /** profile route start **/
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile', 'ProfileController@photo')->name('profile');
    Route::post('/password', 'ProfileController@password')->name('password.change');
    Route::post('/profile-update', 'ProfileController@update')->name('profile.update');
    /** profile route end **/
