<?php
require_once 'router-class.php';
require_once 'app/api/api-comments.controller.php';

// creo el router
$router = new Router();

// armo la tabla de ruteo
$router->addRoute('product/:ID/comment', 'GET', 'ApiCommentController', 'getAll');
$router->addRoute('comment/:ID', 'DELETE', 'ApiCommentController', 'delete');
$router->addRoute('product/:ID/comment', 'POST', 'ApiCommentController', 'insert');           

//Ruta por defecto.
$router->setDefaultRoute('ApiCommentController','show404');

// rutea
$router->route($_REQUEST['resource'],  $_SERVER['REQUEST_METHOD']);

