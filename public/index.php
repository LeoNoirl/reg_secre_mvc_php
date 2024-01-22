<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use Controllers\UsuarioController;
use MVC\Router;

$router = new Router();

// Iniciar Sesion

$router->get('/',[LoginController::class, 'login']);
$router->post('/',[LoginController::class, 'login']);
$router->get('/logout',[LoginController::class, 'logout']);

// Crear Usuario

$router->get('/crear-usuario', [LoginController::class, 'crear']);
$router->post('/crear-usuario', [LoginController::class, 'crear']);

// Panel Usuario
$router->get('/usuario', [UsuarioController::class, 'index']);
$router->post('/usuario', [UsuarioController::class, 'index']);

// Panel Registro
$router->get('/registro', [UsuarioController::class, 'registro']);
$router->post('/registro', [UsuarioController::class, 'registro']);
// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();