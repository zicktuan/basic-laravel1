<?php
    use Illuminate\Support\Facades\Route;
    // get v1/api/menus => get all
    // get v1/api/menu/id => get detail
    // get v1/api/menu/create => create
    // put v1/api/menu/update/id => update
    // delete v1/api/menu/delete/id => delete

    Route::prefix(API_VERSION)->group(function() {
        Route::get('menu', [
            'as' => 'menu-api.getMenu',
            'uses' => 'Api\MenuController@getMenu'
        ]);

        Route::prefix('menu-api')->group(function() {

            Route::get('/{id}', [
                'as' => 'menu-api.detail',
                'uses' => 'Api\MenuController@getDetail'
            ]);

            Route::post('/create', [
                'as' => 'menu-api.create',
                'uses' => 'Api\MenuController@create'
            ]);

            Route::post('/update/{id}', [
                'as' => 'menu-api.update',
                'uses' => 'Api\MenuController@update'
            ]);

            Route::delete('/delete/{id}', [
                'as' => 'menu-api.delete',
                'uses' => 'Api\MenuController@delete'
            ]);
        });

    });

