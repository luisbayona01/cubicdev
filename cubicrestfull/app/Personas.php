<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{ 
	public $timestamps = false;
    protected $table = 'personas'; 
    protected $primaryKey = 'id';
    protected $fillable = [
         'id_empresa_operadora', 'nombres', 'apellidos', 'tipo_documento', 'codigo', 'activo', 'fecha_registro', 'fecha_modificacion', 'registrado_por', 'modificado_por'
    ];

    
}




?>