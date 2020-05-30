<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Str;

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function() {
    return Str::random(32);
});

$router->get('/test', function() {
    $encode = base64_encode(json_encode(['fahri.lafa@gmail.com', '1qw23er4']));
    $decode = base64_decode('WyJmYWhyaS5sYWZhQGdtYWlsLmNvbSIsIjFxdzIzZXI0Il0=');
    return $decode;
});

$router->group(['prefix' => 'user'], function() use ($router) {
    $router->post('/register', ['middleware' => 'register','as' => 'user.register', 'uses' => 'UserController@register']);
    
    $router->get('/fail', function() {
        return response()->json('Forbidden.', 403);
    });
    
    $router->post('/login', ['as' => 'user.login', 'uses' => 'UserController@login']);
    
    $router->get('/{id}', ['as' => 'user.find', 'uses' => 'UserController@getUser']);
});

$router->group(['prefix' => 'patient'], function() use ($router) {
    $router->post('/register', ['as' => 'patient.register', 'uses' => 'PatientController@register']);

    $router->get('/{id}', ['as' => 'patient.find', 'uses' => 'PatientController@getPatientInfo']);
});

$router->group(['prefix' => 'assessment'], function() use ($router) {
    $router->post('/insert', ['as' => 'assessment.insert', 'uses' => 'AssessmentController@insert']);

    $router->get('/{id}', ['as' => 'assessment.find', 'uses' => 'AssessmentController@get']);
});