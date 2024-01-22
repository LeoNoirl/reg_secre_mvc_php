<?php

namespace Model;

class Registro extends ActiveRecord{

    //Base de datos
    protected static $tabla = 'registro';
    protected static $columnasDB = ['id', 'cedula', 'nombre', 'apellido', 'creado', 'descripcion', 'tipo_registro_id'];

    public $id;
    public $cedula;
    public $nombre;
    public $apellido;
    public $creado;
    public $descripcion;
    public $tipo_registro_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->cedula = $args['cedula'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->creado = date('Y-m-d H:i:s');
        $this->descripcion = $args['descripcion'] ?? '';
        $this->tipo_registro_id = $args['tipo_registro_id'] ?? '';
    }

    public function validarRegistro(){
        if(!$this->cedula){
            self::$alertas['error'][] = 'La cedula es obligatorio';
        }
        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if(!$this->apellido){
            self::$alertas['error'][] = 'El apellido es obligatorio';
        }
        if (strlen($this->descripcion) < 10){
            self::$alertas['error'][] = 'La descripcion es obligatorio';
        }
        if(!$this->tipo_registro_id){
            self::$alertas['error'][] = 'Identificar el tipo de registro';
        }
        return self::$alertas;
    }

}