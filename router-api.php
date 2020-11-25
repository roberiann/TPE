<?php
require_once 'RouterClass.php';
require_once 'app/api/api-comments.controller.php';

// creo el router
$router = new Router();

// armo la tabla de ruteo
$router->addRoute('products/:ID/comments', 'GET', 'ApiCommentController', 'getAll');
$router->addRoute('comments/:ID', 'DELETE', 'ApiCommentController', 'delete');
$router->addRoute('comments', 'POST', 'ApiCommentController', 'add');            //VER PORQUE PODRIA SER products/:ID/comments


//$r->addRoute("products-admin", "GET", "ProductoAdminController", "Products");

// $router->addRoute('tareas/:ID', 'GET', 'ApiTaskController', 'get');



// $router->addRoute('tareas/:ID', 'PUT', 'ApiTaskController', 'update');


//Ruta por defecto.
$router->setDefaultRoute('ApiCommentController','show404');

// rutea
$router->route($_REQUEST['resource'],  $_SERVER['REQUEST_METHOD']);

