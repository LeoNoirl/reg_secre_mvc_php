<?php

namespace Model;

class Tipo_Registro extends ActiveRecord{
    //Base de datos
    protected static $tabla = 'tipo_registro';
    protected static $columnasDB = ['id', 't_registro'];

    public $id;
    public $t_registro;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->t_registro = $args['t_registro'] ?? '';
    }
}