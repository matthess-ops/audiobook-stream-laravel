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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('clientdata', 'ClientController@index');
// // Route::post('deleteClientData', 'ClientController@delete');
// Route::post('deleteClientData/{id}', 'ClientController@delete');
// Route::post('createclient', 'ClientController@store');
// Route::put('/client/{id}','ClientController@update');


// Route::post('/upload', 'FileController@upload');


// Route::apiResource('product', 'Api\ProductController');

// // Verb          Path                        Action  Route Name
// // GET           /users                      index   users.index
// // POST          /users                      store   users.store
// // GET           /users/{user}               show    users.show
// // PUT|PATCH     /users/{user}               update  users.update
// // DELETE        /users/{user}               destroy users.destroy


