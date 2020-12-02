<?php
require_once 'app/controllers/category.admin.controller.php';
require_once 'app/controllers/category.user.controller.php';
require_once 'app/controllers/product.admin.controller.php';
require_once 'app/controllers/product.user.controller.php';
require_once 'app/controllers/user.admin.controller.php';
require_once 'app/controllers/user.controller.php';
require_once 'router-class.php';

// CONSTANTES PARA RUTEO
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define("LOGIN", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/login');
define("LOGOUT", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/logout');
define("CATEGORY", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/categories-admin');
define("PRODUCT", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/products-admin');
define("USERS", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/users');

$r = new Router();

// rutas
$r->addRoute("login", "GET", "UserController", "login");
$r->addRoute("logout", "GET", "UserController", "logout");
$r->addRoute("verifyUser", "POST", "UserController", "verifyUser");
$r->addRoute("register", "GET", "UserController", "register");
$r->addRoute("registerUser", "POST", "UserController", "registerUser");

$r->addRoute("users", "GET", "UserAdminController", "getUsers");
$r->addRoute("edit-user/:ID", "GET", "UserAdminController", "editUser");
$r->addRoute("delete-user/:ID", "GET", "UserAdminController", "deleteUser");

$r->addRoute("home", "GET", "CategoryUserController", "home");
$r->addRoute("categories", "GET", "CategoryUserController", "categories");

$r->addRoute("categories-admin", "GET", "CategoryAdminController", "categories");
$r->addRoute("insert-category", "POST", "CategoryAdminController", "insertCategory");
$r->addRoute("delete-category/:ID", "GET", "CategoryAdminController", "deleteCategory");
$r->addRoute("category-edit/:ID", "GET", "CategoryAdminController", "category");
$r->addRoute("edit-category", "POST", "CategoryAdminController", "editCategory");


$r->addRoute("category/:ID", "GET", "ProductUserController", "productsByCategory");
$r->addRoute("product/:ID", "GET", "ProductUserController", "productDetail");
$r->addRoute("products", "GET", "ProductUserController", "products");
// $r->addRoute("productsa", "GET", "ProductUserController", "productsa");


$r->addRoute("products-admin", "GET", "ProductAdminController", "products");
$r->addRoute("delete-product/:ID", "GET", "ProductAdminController", "deleteProduct");
$r->addRoute("insert-product", "POST", "ProductAdminController", "addProduct");
$r->addRoute("edit-product/:ID", "GET", "ProductAdminController", "product");        
$r->addRoute("edit-product", "POST", "ProductAdminController", "editProduct");

//Ruta por defecto.
$r->setDefaultRoute("CategoryUserController", "home");

//run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
