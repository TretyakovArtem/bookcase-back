<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$app->get('/hello/{name}', function ($name) use ($app) {
    return "Hello {$name}";
});


$app->get('/hello/{name}', ['middleware' => 'hello', function ($name) {
    return "Hello { $name } ";
}]);


$app->get('/request', function (Illuminate\Http\Request $request) {
    return "Hello " . $request->get('name', 'stranger');
});

$app->get('/books', 'BooksController@index');

$app->get('/books/{id:[\d]+}', [
    'as' => 'books.show',
    'uses' => 'BooksController@show'
]);

$app->post('/books', 'BooksController@store');
