<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth0 Stateless Routes
|--------------------------------------------------------------------------
|
| These routes demonstrate how you can use the Auth0 Laravel HTTP middleware
| to automatically handle incoming requests with bearer tokens. The following
| middleware is available to you:
|
*/

/**
 * - auth0.authorize
 *   Requires a valid bearer token to access the route.
 */
Route::get('/required', function () {
    return response()->json([
        'authorized' => true,
        'user' => json_decode(json_encode((array) Auth::user(), JSON_THROW_ON_ERROR), true),
    ], 200, [], JSON_PRETTY_PRINT);
})->middleware(['auth0.authorize']);

/**
 * - auth0.authorize:scope
 *   Requires a valid bearer token with the defined scope to access the route.
 */
Route::get('/scoped', function () {
    return response()->json([
        'authorized' => true,
        'user' => json_decode(json_encode((array) Auth::user(), JSON_THROW_ON_ERROR), true),
    ], 200, [], JSON_PRETTY_PRINT);
})->middleware(['auth0.authorize:offline_access']);

/**
 * - auth0.authorize.optional
 *   Resolves the bearer token to a user model when provided, but will not stop requests without one.
 */
Route::get('/', function () {
    if (Auth::check()) {
        return response()->json([
            'authorized' => true,
            'user' => json_decode(json_encode((array) Auth::user(), JSON_THROW_ON_ERROR), true),
        ], 200, [], JSON_PRETTY_PRINT);
    }

    return response()->json([
        'authorized' => false,
        'user' => null,
    ], 200, [], JSON_PRETTY_PRINT);
})->middleware(['auth0.authorize.optional']);
