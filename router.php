<?php
require_once 'API-REST-FULL/controller/destinos_controller.php';
require_once 'API-REST-FULL/libs/router.php';
//require_once 'controller/user_API_controller.php';
//require_once 'middleware/jwt_auth_middleware.php';

$router = new Router();

//$router->addMiddleware(new AuthMiddleware());

// defino la tabla de ruteo
$router->addRoute('destinos',        'GET',     'DestinosController',   'getAll');
$router->addRoute('destinos/:id',    'GET',     'DestinosController',   'get'   );
$router->addRoute('destinos/:id',    'DELETE',  'DestinosController',   'delete');
// $router->addRoute('destinos',        'POST',    'DestinosController',   'create');
// $router->addRoute('destinos/:id',    'PUT',     'DestinosController',   'update');

//$router->addRoute('usuarios/token',  'GET',     'UserApiController',   'getToken');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

