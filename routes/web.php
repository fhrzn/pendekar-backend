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

    $router->get('/', ['as' => 'patient.all', 'uses' => 'PatientController@getAll']);
    
    $router->get('/{patientId}/treatment', ['as' => 'patient.treatment', 'uses' => 'PatientController@getPatientTreatment']);

    $router->get('/{patientId}/assessment', ['as' => 'patient.assessment', 'uses' => 'PatientController@getPatientAssessment']);

    $router->post('/{id}/status/update', ['as' => 'patient.status', 'uses' => 'PatientController@updatePatientStatus']);
});

$router->group(['prefix' => 'assessment'], function() use ($router) {
    $router->post('/insert', ['as' => 'assessment.insert', 'uses' => 'AssessmentController@insert']);

    $router->get('/{id}', ['as' => 'assessment.find', 'uses' => 'AssessmentController@get']);

    $router->get('/', ['as' => 'assessment.all', 'uses' => 'AssessmentController@getAll']);
});

$router->group(['prefix' => 'treatment'], function() use ($router) {
    $router->post('/insert', ['as' => 'treatment.insert', 'uses' => 'TreatmentLogController@insert']);

    $router->get('/{id}', ['as' => 'treatment.get', 'uses' => 'TreatmentLogController@get']);

    $router->get('/', ['as' => 'treatment.all', 'uses' => 'TreatmentLogController@getAll']);

    $router->get('/{id}/remove', ['as' => 'treatment.delete', 'uses' => 'TreatmentLogController@remove']);
});

$router->group(['prefix' => 'implement'], function() use ($router) {
    $router->get('/', ['as' => 'treatment.implement.all', 'uses' => 'TreatmentImplementLogController@getAll']);

    $router->post('/insert', ['as' => 'treatment.implement.insert', 'uses' => 'TreatmentImplementLogController@insert']);

    $router->get('/{id}', ['as' => 'treatment.implement.get', 'uses' => 'TreatmentImplementLogController@get']);
});