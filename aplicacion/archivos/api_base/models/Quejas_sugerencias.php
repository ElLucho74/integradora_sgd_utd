<?php
  //Clase que utilizara para crear el modelo que interactua
  //con la BD api_restful

  class quejas_sugerencias extends Conectar
  {
    //funcion para traer todos los registros de la tabla categoria
    public function getquejas_sugerencias()
    {
        //llamar la cadena de conexion a la BD
        $conectar=parent::Conexion();

        //String para la consulta 
        $sql="select * from quejas_sugerencias";

        //Preparar la conexion con la String
        $sql=$conectar->prepare($sql);

        //Ejecutar la consulta
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //funcion para traer un resgistro en particular 
    public function getquejas_sugerencias_id($id_qj)
    {
      
      $conectar=parent::Conexion();
      $sql="select * from quejas_sugerencias where id_qj=?";
      $sql=$conectar->prepare($sql);
      // utilizar los parametros en la consulta
      $sql->bindValue(1,$id_qj);
      $sql->execute();

      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function postquejas_sugerencias($no_empleado_qj,$comentario)
    {

      
        $conectar=parent::Conexion();
        $sql="insert into quejas_sugerencias VALUES (null,?,?,CURRENT_TIMESTAMP)";
        $sql=$conectar->prepare($sql);
        //UTILIZAR LOS PRAMETROS EN LA CONSULTA
        $sql->bindValue(1,$no_empleado_qj);
        $sql->bindValue(2,$comentario);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function deletequejas_sugerencias($id_qj)
    {

      
        $conectar=parent::Conexion();
        $sql="delete from quejas_sugerencias where id_qj=?";
        $sql=$conectar->prepare($sql);
        //UTILIZAR LOS PRAMETROS EN LA CONSULTA
        $sql->bindValue(1,$id_qj);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

  }


?>