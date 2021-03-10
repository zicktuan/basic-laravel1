<?php
    use Illuminate\Support\Facades\Route;

    Route::prefix(PREFIX_ADMIM)->group(function() {
        Route::prefix('page')->group(function() {

            Route::get('create', [
                'as' => 'page.create',
                'uses' => 'Backend\PageController@create'
            ]);

            Route::get('edit/{id}', [
                'as' => 'page.edit',
                'uses' => 'Backend\PageController@edit'
            ]);

            Route::get('manage', [
                'as' => 'page.manage',
                'uses' => 'Backend\PageController@manage'
            ]);
        });
    });

