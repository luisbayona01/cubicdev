<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{ 
	public $timestamps = false;
    protected $table = 'usuarios';  // tabla usuarios
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_empresa_operadora', 'id_persona', 'usuario', 'clave', 'activo','fecha_ultimo_ingreso','fecha_registro','fecha_modificacion','registrado_por','modificado_por'
    ];

    
}
