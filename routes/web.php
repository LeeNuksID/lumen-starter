<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix'=>'v1'], function() use($router){

	// Authenticate
    $router->post('/register', 'AuthController@register');      // Register
    $router->post('/auth', 'AuthController@store');             // Login
	    
    $router->post('auth/email/{id:[0-9]+}', 'AuthController@update_email');     // Update Email
    $router->post('auth/password/{id:[0-9]+}', 'AuthController@update_pw');     // Update Password

    // School
    $router->get('school', 'SchoolController@index');
    $router->get('school/{id}', 'SchoolController@index_id');
    $router->post('school', 'SchoolController@store');
    $router->put('school/{id}', 'SchoolController@update');
    $router->delete('school/{id}', 'SchoolController@destroy');
	
	$router->group(['middleware' => 'auth:api'], function() use ($router){
    	$router->get('/', function () use ($router){
    		return 'Hello World';
    	});

    });

});
