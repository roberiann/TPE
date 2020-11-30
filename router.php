<?php
require_once 'app/controllers/category.admin.controller.php';
require_once 'app/controllers/category.user.controller.php';
// require_once 'app/controllers/category.invited.controller.php';
require_once 'app/controllers/product.admin.controller.php';
// require_once 'app/controllers/product.invited.controller.php';
require_once 'app/controllers/product.user.controller.php';
require_once 'app/controllers/user.controller.php';
require_once 'router-class.php';

// CONSTANTES PARA RUTEO
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define("LOGIN", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/login');
define("LOGOUT", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/logout');
define("CATEGORY", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/categories-admin');
define("PRODUCT", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/products-admin');
// define("LOGGED", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/homeLogged');
define("USERS", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/users');

$r = new Router();

// rutas
$r->addRoute("login", "GET", "UserController", "Login");
$r->addRoute("logout", "GET", "UserController", "Logout");
$r->addRoute("verifyUser", "POST", "UserController", "VerifyUser");
$r->addRoute("register", "GET", "UserController", "Register");
$r->addRoute("registerUser", "POST", "UserController", "RegisterUser");
$r->addRoute("users", "GET", "UserController", "GetUsers");
$r->addRoute("edit-user/:ID", "GET", "UserController", "EditUser");
$r->addRoute("delete-user/:ID", "GET", "UserController", "DeleteUser");

$r->addRoute("home", "GET", "CategoryUserController", "Home");
$r->addRoute("categories", "GET", "CategoryUserController", "Categories");

// $r->addRoute("homeLogged", "GET", "CategoryUserController", "Home");
// $r->addRoute("categoriesLogged", "GET", "CategoryUserController", "Categories");

$r->addRoute("categories-admin", "GET", "CategoryAdminController", "Categories");
$r->addRoute("insert-category", "POST", "CategoryAdminController", "InsertCategory");
$r->addRoute("delete-category/:ID", "GET", "CategoryAdminController", "DeleteCategory");
$r->addRoute("category-edit/:ID", "GET", "CategoryAdminController", "Category");
$r->addRoute("edit-category", "POST", "CategoryAdminController", "EditCategory");
// $r->addRoute("home-admin", "GET", "CategoryAdminController", "Home");

// $r->addRoute("products", "GET", "ProductInvitedController", "Products");
// $r->addRoute("category/:ID", "GET", "ProductInvitedController", "ProductsByCategory");
// $r->addRoute("product/:ID", "GET", "ProductInvitedController", "ProductDetail");

$r->addRoute("products", "GET", "ProductUserController", "Products");
$r->addRoute("category/:ID", "GET", "ProductUserController", "ProductsByCategory");
$r->addRoute("product/:ID", "GET", "ProductUserController", "ProductDetail");

$r->addRoute("products-admin", "GET", "ProductAdminController", "Products");
$r->addRoute("delete-product/:ID", "GET", "ProductAdminController", "DeleteProduct");
$r->addRoute("insert-product", "POST", "ProductAdminController", "addProduct");
$r->addRoute("edit-product/:ID", "GET", "ProductAdminController", "Product");
$r->addRoute("edit-product", "POST", "ProductAdminController", "EditProduct");

//Ruta por defecto.
$r->setDefaultRoute("CategoryUserController", "Home");


//run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
