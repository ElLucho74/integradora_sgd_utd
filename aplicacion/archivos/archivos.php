<?php
include_once("sesiones.php");
include_once("../bd/db.php");
include_once("encabezado.php");
$id_clases=$_REQUEST['id_clases'];

$entrar="";


$consulta="select * from tipo_doc";
$resultado = $conn->query($consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivos</title>
    <link rel="stylesheet" href="parciales.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <!-- CSS only -->
</head>
<body align="center">
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
  <br><br><br><br>
  <div class="title-cards">
		<h2>Archivos</h2>

	</div>
  <div align="right">
  <div class="container-card">

<?php

while($fila = mysqli_fetch_array($resultado)){ 



?>
<div class="card">
	<div class="contenido-card">
		<h4><?php echo $fila['nombre_tipo_doc'] ?></h3>
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#archivos<?php echo $fila['id_doc']; ?>">
  Subir
</button>
	</div>
</div>
<!--Proyectos -->
<div class="modal fade" id="archivos<?php echo $fila['id_doc']; ?>" tabindex="-1" aria-labelledby="" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subir <?php echo$fila['nombre_tipo_doc'] ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered table-hover">
        <thead>
    <tr>
      <th>Carrera</th>
      <th>Clases</th>
      <?php if($rol=="admin"){?>
      <th>Docente</th>
      <th>Apellidos</th>
        <?php } ?>
      <th>Archivo</th>
      <th>Ruta</th>
    </tr>
    </thead>
</center><?php if($rol=="admin"){ 
  $consultaadminproyecto="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension,u.id_usuarios,u.nombre,u.apellidos,b.id_carrera,b.nombre_c
  from clases c, archivos a, usuarios u, carreras b where tipo_documento='$fila[id_doc]' and a.docente=u.id_usuarios and c.carrera=b.id_carrera and a.clase='$id_clases' and c.id_clases='$id_clases'";
  $resultadoadminproyecto = $conn->query($consultaadminproyecto);

if ($resultadoadminproyecto->num_rows > 0) {
  while ($filaadminproyecto = $resultadoadminproyecto->fetch_assoc()) {



?>
<tbody>
        <tr>
          <td><?php echo $filaadminproyecto['nombre_c']?></td>
          <td><?php echo $filaadminproyecto['nombre_clase']?></td>
          <?php if($rol=="admin"){?>
            <td><?php echo $filaadminproyecto['nombre']?></td>
            <td><?php echo $filaadminproyecto['apellidos']?></td>
        <?php } ?>
          <td><?php echo $filaadminproyecto['nom_archivos']?></td>
          <td>
              <a class="btn btn-block btn-outline-success" target="_blank" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '' . $filaadminproyecto['ruta']; ?>"> Ver el archivo</a>
          </td>
        </tr>
        </th>
        </tbody>
    <?php
  }
      }
    }

    ?>

<?php
$consulta5="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension,a.tipo_documento,b.id_carrera,b.nombre_c from clases c, archivos a, carreras b where c.id_clases='$id_clases' and a.docente='$id_usuarios' and c.carrera=b.id_carrera and a.tipo_documento='$fila[id_doc]' and a.clase='$id_clases' and c.id_clases='$id_clases'";
$resultado5 = $conn->query($consulta5);

if ($resultado5->num_rows > 0) {
  while ($fila5 = $resultado5->fetch_assoc()) {



?>

        <tr>
          <td><?php echo $fila5['nombre_c']?></td>
        <td><?php echo $fila5['nombre_clase']?></td>
          <td><?php echo $fila5['nom_archivos']?></td>
          <td>
              <a class="btn btn-block btn-outline-success" target="_blank" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '' . $fila5['ruta']; ?>" type="button"> Ver el archivo</a>
          </td>
        </tr>
        </th>
    <?php
      }
    }

    ?>
  <form action="subirarchivo.php" method="POST" enctype="multipart/form-data">
    <table align="center">
      <tr>
        <td>
        <?php if($rol=="estandar"){?>
          <input name="archivo" id="archivo" type="file" size="70" maxlength="70">
        </td>
      </tr>
      <tr>
        <td>
        <input type="hidden" name="id_doc" id="doc1"
        <?php
    $querydoc = $conn -> query ("SELECT * FROM tipo_doc where id_doc='$fila[id_doc]'");

    while ($valoresdoc = mysqli_fetch_array($querydoc)) { 

      echo '<option value="'.$valoresdoc['id_doc'].'"></option>';

    }
  ?>>
        
        <input type="hidden" name="id_clases" id="clase1"
    <?php
    $query = $conn -> query ("SELECT * FROM clases where id_clases='$id_clases'");

    while ($valores = mysqli_fetch_array($query)) { 

      echo '<option value="'.$valores['id_clases'].'"></option>';

    }
  ?>>
        </td>
        <td>
          <button class="btn btn-primary start">
                          <i class="fas fa-upload"></i>
                          <input type="submit" name="enviar">
                          <span></span>
                        </button>
          <input type="reset" name="borrar" value="Cancelar" class="eliminar">
        </td>
        <?php } ?>
      </tr>
    </table>
    
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



</body>
</html>
<?php

include_once('alertas.php');
}
?>
<script src="foranea.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>