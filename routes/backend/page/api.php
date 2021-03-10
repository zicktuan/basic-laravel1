<?php
    use Illuminate\Support\Facades\Route;
    // get v1/api/pages => get all
    // get v1/api/page/id => get detail
    // get v1/api/page/create => create
    // put v1/api/page/update/id => update
    // delete v1/api/page/delete/id => delete
    // post v1/api/page/create => get detail

    Route::prefix(API_VERSION)->group(function() {
        Route::get('pages', [
            'as' => 'page-api.getPage',
            'uses' => 'Api\PageController@getPage'
        ]);

        Route::prefix('page-api')->group(function() {

            Route::get('/{id}', [
                'as' => 'page-api.detail',
                'uses' => 'Api\PageController@getDetail'
            ]);

            Route::post('/create', [
                'as' => 'page-api.create',
                'uses' => 'Api\PageController@create'
            ]);

            Route::post('/update/{id}', [
                'as' => 'page-api.update',
                'uses' => 'Api\PageController@update'
            ]);

            Route::delete('/delete/{id}', [
                'as' => 'page-api.delete',
                'uses' => 'Api\PageController@delete'
            ]);
        });

    });

