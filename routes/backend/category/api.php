<?php
    use Illuminate\Support\Facades\Route;
    // get v1/api/cats => get all
    // get v1/api/cat/id => get detail
    // get v1/api/cat/create => create
    // put v1/api/cat/update/id => update
    // delete v1/api/cat/delete/id => delete

    Route::prefix(API_VERSION)->group(function() {
        Route::get('category', [
            'as' => 'cat-api.getCat',
            'uses' => 'Api\CategoryController@getCat'
        ]);

        Route::prefix('cat-api')->group(function() {

            Route::get('/{id}', [
                'as' => 'cat-api.detail',
                'uses' => 'Api\CategoryController@getDetail'
            ]);

            Route::post('/create', [
                'as' => 'cat-api.create',
                'uses' => 'Api\CategoryController@create'
            ]);

            Route::post('/update/{id}', [
                'as' => 'cat-api.update',
                'uses' => 'Api\CategoryController@update'
            ]);

            Route::delete('/delete/{id}', [
                'as' => 'cat-api.delete',
                'uses' => 'Api\CategoryController@delete'
            ]);
        });

    });

