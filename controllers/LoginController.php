<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController{
    public static function login(Router $router){

     $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $auth = new Usuario($_POST);

            $alertas = $auth->validarLogin();

            if(empty($alertas)){
                
                //Comprobar que exista el usuario
                $usuario = Usuario::where('usuario', $auth->usuario);

                if($usuario){

                    if($usuario->comprobarPassword($auth->password)){
                        //autenticar el usuario

                        // session_start();

                        $_SESSION['id'] = $usuario -> id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['usuario'] = $usuario->usuario;
                        $_SESSION['login'] = true;

                        //redireccionamiento 

                        if($usuario->admin === "1"){

                        } else {
                            header('Location: /usuario');
                        }
                    }

                } else {
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }

            }
        }
        
        $alertas = Usuario::getAlertas();

        $router->render('auth/login',[
            'alertas' => $alertas,
        ]);
    }

    public static function crear(Router $router){
        $usuario = new Usuario;

        //Alertas vacias
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevoUsuario();

            if(empty($alertas)){
                //Verifica que el usuario no este registrado
                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows){
                    $alertas = Usuario::getAlertas();
                } else {
                    // hashear contraseña
                    $usuario->hashPassword();

                    //Crear el usuario
                    $resultado = $usuario->guardar();

                    header('Location: /');
                }
            }


        }

        $router->render('auth/crear-usuario',[
            'usuario'=> $usuario,
            'alertas' => $alertas
        ]);
    }
    public static function logout(){
        
        $_SESSION = [];
        
        header('Location: /');
    }
}

