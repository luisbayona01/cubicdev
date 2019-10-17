<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaOperadora extends Model
{ 
	public $timestamps = false;
    protected $table = 'empresas_operadoras';  // tabla usuarios
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pais','nombre','logo','activo','fecha_registro','fecha_modificacion','registrado_por','modificado_por'
    ];



}
