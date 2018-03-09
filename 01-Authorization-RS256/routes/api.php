<?php

use Illuminate\Http\Request;

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

Route::get('/public', function (Request $request) {
    return response()->json(["message" => "Hello from a public endpoint! You don't need to be authenticated to see this."]);
});

Route::get('/private', function (Request $request) {
    return response()->json(["message" => "Hello from a private endpoint! You need to have a valid access token to see this."]);
})->middleware('jwt');

Route::get('/private-scoped', function (Request $request) {
    return response()->json([
        "message" => "Hello from a private endpoint! You need to have a valid access token and a scope of read:messages to see this."
    ]);
})->middleware('check.scope:read:messages');
