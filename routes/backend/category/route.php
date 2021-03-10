<?php
    use Illuminate\Support\Facades\Route;

    Route::prefix(PREFIX_ADMIM)->group(function() {
        Route::prefix('category')->group(function() {

            Route::get('create', [
                'as' => 'category.create',
                'uses' => 'Backend\CategoryController@create'
            ]);

            Route::get('edit/{id}', [
                'as' => 'category.edit',
                'uses' => 'Backend\CategoryController@edit'
            ]);

            Route::get('manage', [
                'as' => 'category.manage',
                'uses' => 'Backend\CategoryController@manage'
            ]);
        });
    });

