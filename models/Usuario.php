<?php

namespace Model;

class Usuario extends ActiveRecord
{
    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'usuario', 'nombre', 'apellido', 'password', 'admin'];

    public $id;
    public $usuario;
    public $nombre;
    public $apellido;
    public $password;
    public $admin;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->usuario = $args['usuario'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->admin = $args['admin'] ?? '0';
    }

    //Mensaje de Validacion para la creacion de usuarios

    public function validarNuevoUsuario()
    {
        if (!$this->usuario) {
            self::$alertas['error'][] = 'El Usuario es obligatorio';
        }
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es obligatorio';
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = 'El Apellido es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'La Contraseña es obligatorio';
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'La Contraseña debe de contener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    // funcion validar login

    public function validarLogin()
    {
        if (!$this->usuario) {
            self::$alertas['error'][] = 'El Usuario es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'La Contraseña es obligatorio';
        }
        return self::$alertas;
    }

    //Revisa si el usuario ya existe

    public function existeUsuario()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE usuario = '" . $this->usuario . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El Usuario ya existe';
        }
        return $resultado;
    }

    // Hashear Contraseña

    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function comprobarPassword($password){
        $resultado = password_verify($password, $this->password);
        if(!$resultado){
            self::$alertas['error'][] = 'Contraseña Incorrecta';
        } else {
            return true;
        }
    }
}
