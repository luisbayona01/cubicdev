<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\usuarios;
use App\personas;

header("Access-Control-Allow-Origin: *");
class UsuariosController extends Controller
{
  public  function  Login(request $request){
  	
    $correo=$request->input('email');
    $password=$request->input('password'); 
    
  
     
    $data = Usuarios::where('usuario', '=', $correo)->Where('clave', '=', $password)->get();
    
   $respuesta=array();
   if (count($data)!=0){
     
     if($data[0]['activo']==1){
      $respuesta[]=array("status"=>"true","idusuario"=> $data[0]['id'],"correo"=>$data[0]['usuario']);
      
     }else{

    $respuesta[]=array('msg' =>"este usuario esta inactivo","status"=>"inactive" );
     }


      

   } else{
       $respuesta[]= array('status' =>"false","msg"=>"usuario o contraseña icorrectos" );

   }

    return  $respuesta;
   
  }

public  function  Userempresaoperadora(request $request){
 //var_dump($request->input());
$datos=$Request=json_decode(file_get_contents('php://input'));
 
  $users = DB::table('usuarios')->select('usuarios.id_empresa_operadora', 'empresas_operadoras.nombre')
            ->join('empresas_operadoras', 'empresas_operadoras.id', '=', 'usuarios.id_empresa_operadora')
             ->where('usuarios.usuario', $datos->correo)
            ->get();

   return $users;


  }

public  function crearmenu(request $request){
$datos=$Request=json_decode(file_get_contents('php://input'));
$iduser=$datos->idusuario;
$menu = DB::table('menu')->where('idusuario', '=', $iduser)->get();
return $menu;
}

public  function submenu(request $request){
$datos=$Request=json_decode(file_get_contents('php://input'));
$idaplicacion=$datos->idaplicacion;
$submenu = DB::table('menuaplicaciones')->where('idaplicacion', '=', $idaplicacion)->get();
return $submenu;
}

public  function rutasmenu(request $request){
$datos=$Request=json_decode(file_get_contents('php://input'));
$idmodulo=$datos->idmodulo;
$rutasmenu = DB::table('rutasmenu')->where('idmodulo', '=', $idmodulo)
->get();

return $rutasmenu;
}

public function saveUser(request $request){
  $usuario=new  usuarios;

  $nombre=$request->input('nombre'); 
  $apellido=$request->input('apellido');
  $tipoidentificacion=$request->input('tipoidentificacion');
  $identificacion=$request->input('identificacion'); 
  $empresa=$request->input('empresa');
  $correo=$request->input('correo'); 
  $password=$request->input('password');

$validacodigounique = DB::table('personas')->where('codigo', '=', $identificacion)->orWhere('usuario', '=', $correo)
->get();

 if(count($validacodigounique)!='0'){
 //echo "aqui";
  $respuesta[] = array('msg' =>" esta  identificacion ya esta registrada");
 
 }else{

  $id=$this->savepersona($empresa,$nombre,$apellido,$tipoidentificacion,$identificacion);


$ldate = date('Y-m-d H:i:s');
$usuario->id_empresa_operadora=$empresa;
$usuario->id_persona=$id;
$usuario->usuario=$correo;
$usuario->clave=$password;
$usuario->activo='1';
$usuario->fecha_ultimo_ingreso="";
$usuario->fecha_registro=$ldate;
$usuario->fecha_modificacion="";
$usuario->registrado_por="";
$usuario->modificado_por="";
  if($usuario->save()){

   $respuesta[]= array('msg' =>" se creo el usuario satisfactoriamente" );

  }  

 } 

 return $respuesta;

}

public function  savepersona($empresa,$nombres,$apellidos,$tipo_documento,$codigo){
$personas= new personas;
$ldate = date('Y-m-d H:i:s');


$personas->id_empresa_operadora=$empresa;
$personas->nombres=$nombres;
$personas->apellidos=$apellidos;
$personas->tipo_documento=$tipo_documento;
$personas->codigo=$codigo;
$personas->activo="1";
$personas->fecha_registro=$ldate;
$personas->fecha_modificacion="";
$personas->registrado_por="";
$personas->modificado_por="";



if($personas->save()){
 return $personas->id;

}


}


  public  function getusers(){
  $users = DB::table('usuariospersonas')->get();
  return $users;
  }


}
