<?php



Route::get('/','UserController@index');


Route::group(['namespace'=>'Admin'],function() {
    Route::group(['prefix'=>'admin', 'as' => 'admin.'],function() {
        // news
        Route::get('/news/', 'NewsController@getList');
        Route::get('/news/find/{id}', 'NewsController@getFind');
        Route::get('/news/create', 'NewsController@getCreate');
        Route::post('/news/create', 'NewsController@postCreate');
        Route::get('/news/update/{id}', 'NewsController@getUpdate');
        Route::put('/news/update/{id}', 'NewsController@postUpdate');
        Route::get('/news/all-trash', 'NewsController@getAllTrash');
        Route::get('/news/trash/{id}', 'NewsController@getTrash');
        Route::get('/news/recover/{id}', 'NewsController@getRecover');
        Route::get('/news/delete/{id}', 'NewsController@getDelete');
        // categories
        Route::get('/categories/', 'NewsCategoriesController@getList');
        Route::get('/categories/find/{id}', 'NewsCategoriesController@getFind');
        Route::get('/categories/create', 'NewsCategoriesController@getCreate');
        Route::post('/categories/create', 'NewsCategoriesController@postCreate');
        Route::get('/categories/update/{id}', 'NewsCategoriesController@getUpdate');
        Route::put('/categories/update/{id}', 'NewsCategoriesController@postUpdate');
        Route::get('/categories/all-trash', 'NewsCategoriesController@getAllTrash');
        Route::get('/categories/trash/{id}', 'NewsCategoriesController@getTrash');
        Route::get('/categories/recover/{id}', 'NewsCategoriesController@getRecover');
        Route::get('/categories/delete/{id}', 'NewsCategoriesController@getDelete');
    });
});