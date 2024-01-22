<?php

namespace Controllers;

use Model\Registro;
use Model\Tipo_Registro;
use MVC\Router;

class UsuarioController{
    public static function index(Router $router){
     
        $registros = Registro::all();
        $router->render('registro/usuario', [
            'registros' => $registros
        ]);
    }

    public static function registro(Router $router){
        $alertas = [];
        $auth = new Registro;
        $t_registro = Tipo_Registro::all();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $auth = new Registro($_POST);
            $alertas = $auth->validarRegistro();
            if(empty($alertas)){
                        $auth->guardar();
                        header('Location: /usuario');
                    }
            }
        $alertas = Registro::getAlertas();
        $router->render('registro/registro',[
            'alertas' => $alertas,
            't_registro' => $t_registro,
            'auth' => $auth
        ]);
    }
}