<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix'=>'v1'], function() use($router){

	// Authenticate
	$router->post('/auth', 'AuthController@store');
	    
    $router->post('auth/email/{id:[0-9]+}', 'AuthController@update_email');
    $router->post('auth/password/{id:[0-9]+}', 'AuthController@update_pw');

    $router->post('/register', 'AuthController@register');
	
	$router->group(['middleware' => 'auth:api'], function() use ($router){
    	$router->get('/', function () use ($router){
    		return 'Hello World';
    	});
    });

});
