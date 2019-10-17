<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\EmpresaOperadora;
header("Access-Control-Allow-Origin: *");
class EmpresaOperadoraController extends Controller
{  
 public  function registrar_empresa(request $request)
 {   
  $EmpresaOperadora= new EmpresaOperadora();
 	
 	 $ldate = date('Y-m-d H:i:s');
 	 $EmpresaOperadora->id_pais="303"; 
 	 $EmpresaOperadora->nombre =$request->nombreEmpresa;
 	 $EmpresaOperadora->logo ="";
 	 $EmpresaOperadora->activo="1"; 
 	 $EmpresaOperadora->fecha_registro=$ldate; 
 	 $EmpresaOperadora->fecha_modificacion=""; 
 	 $EmpresaOperadora->registrado_por="1";
 	 $EmpresaOperadora->modificado_por="";
     
     $respuesta= array();
     if(!$EmpresaOperadora->save()){
      $respuesta[]=array("msg"=>"ocurrio un error");
     }else{
     $respuesta[]=array("msg"=>"se creo la empresa con exito");

     }
      return  $respuesta;
 
          }
 

public   function showempresa(){
 
 $empresas= EmpresaOperadora::all();
 return $empresas;
}

} 


?>