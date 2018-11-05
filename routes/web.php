<?php

Route::get('/updateWeather', function(){
    return view('pages.updateWeather');
});

Route::get('/registry', function(){
    return redirect('https://www.amazon.com/wedding/matt-rutter-kaitlyn-gilmore-grand-junction-june-2018/registry/2NMV1Q7WQI2MG');
});

Route::get('/', 'PagesController@index');

Route::get('/gallery', 'PagesController@gallery');

Route::get('/weather/{date}', 'ChartsController@weather');

Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::put('/dashboard/{id}', 'DashboardController@update');