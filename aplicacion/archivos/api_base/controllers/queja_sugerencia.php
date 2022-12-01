<?php
  //Crear el controlador que se comunique con el modelo
  //para acceder a los metodos del modelo a traves de los 
  //endpoint 

  //Agregar la siguiente linea para que la app sepa que se se utilzaran JSON
  header('Content-Type:application/json');

  require_once("../config/conexion.php");
  require_once("../models/Quejas_sugerencias.php");

  //crear un objeto de tipo categoria para instancias los 
  //metodos del modelo
  $qs=new quejas_sugerencias;

  //Recibir la informacion en un JSON que hay que preparar en objeto body
  $body=json_decode(file_get_contents("php://input"),true);

  //crear un switch para navegar entre los diferentes 
  //servicios que ofrece el API a traves del los endpoint
  switch($_GET["op"])
  {
    //case es para regresar todos los registros de categoria
    case "selectall": $datos=$qs->getquejas_sugerencias();
                      echo json_encode($datos);
                      break;

    //case es para regresar un registro en particular de categoria
    case "selectid": $datos=$qs->getquejas_sugerencias_id($body["id_qj"]);
                      echo json_encode($datos);
                      break;       
                      
    //case es para regresar un registro en particular de categoria
    case "insert": $datos=$qs->postquejas_sugerencias($body["no_empleado_qj"],$body["comentario"]);
                      echo json_encode("Se envio su comentario correctamente");
                      break;       

    //case es para regresar un registro en particular de categoria
    case "delete": $datos=$qs->deletequejas_sugerencias($body["id_qj"]);
                      echo json_encode("Se elimino correctamente");
                      break;    

  }

?>