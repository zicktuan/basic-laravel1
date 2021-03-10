<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
    const API_VERSION = 'v1';

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route admin page
    include 'backend/page/api.php';
// Route admin category
    include 'backend/category/api.php';
    // Route admin category
    include 'backend/menu/api.php';

