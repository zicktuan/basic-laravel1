<?php
    use Illuminate\Support\Facades\Route;

    Route::prefix(PREFIX_ADMIM)->group(function() {
        Route::prefix('menu')->group(function() {

            Route::get('create', [
                'as' => 'menu.create',
                'uses' => 'Backend\MenuController@create'
            ]);
//
//            Route::get('edit/{id}', [
//                'as' => 'menu.edit',
//                'uses' => 'Backend\MenuController@edit'
//            ]);

            Route::get('manage', [
                'as' => 'menu.manage',
                'uses' => 'Backend\MenuController@manage'
            ]);
        });
    });

