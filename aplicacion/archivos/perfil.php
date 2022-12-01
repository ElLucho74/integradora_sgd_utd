<?php
include_once('encabezado.php');
include_once("../bd/db.php");
include_once('sesiones.php');

$consulta="select * from usuarios where id_usuarios='$id_usuarios'";
$resultado=mysqli_query($conn,$consulta);

$consultadocs_personales="select t.id_docpersonal,t.nombre_docpersonal from tipo_doc_personal t";
$resultadodocs_personales=mysqli_query($conn,$consultadocs_personales);

if (mysqli_num_rows($resultado)>0){
    while($fila=mysqli_fetch_assoc($resultado))
    {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="content-wrapper">
<section class="content-header">
    </section>

    <!--  -->
    <div class="content">
      <div class="container-fluid">
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <br><br>
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                  src="<?php echo $fila['foto_perfil'] ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $usuarios ?> </h3>
                <h3 class="profile-username text-center" ><?php echo $fila['apellidos'] ?> </h3>

                <p class="text-muted text-center"><?php echo $fila['correo'] ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>No Empleado</b> <a class="float-right"><?php echo $no_empleado ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Telefono</b> <a class="float-right"><?php echo $fila['telefono'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Estatus</b> <a class="float-right"><?php echo $fila['estatus'] ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        
</div>
<div class="col-md-9">
<section class="content-header">
    </section>
    <br>
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Documentos</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Configuracion</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>

                        <div class="timeline-item">
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <table class="table">
  <thead>
    <tr>
      <th scope="col">Tipo de Documento</th>
      <th scope="col">Nombre</th>
      <th scope="col">Fecha y Hora</th>
      <th scope="col">Estatus</th>
    </tr>
  </thead>
  <tbody>
    <?php

    if ($resultadodocs_personales->num_rows > 0) {
      while ($filadocs_personales = $resultadodocs_personales->fetch_assoc()) {


    ?>
    <tr>
      <th scope="row"><?php echo $filadocs_personales['nombre_docpersonal']; ?></th>
      <td></td>
      <td></td>
      <td>
        
      <?php if($rol=="estandar"){?>
        <form action="subir_docspersonales/subir_titulo.php" method="POST" enctype="multipart/form-data">
          <input name="archivo" id="archivo" type="file" size="70" maxlength="70" >
          <input type="submit" name="enviar" value="subir" class="btn_acciones">
          <input type="reset" name="borrar" value="Cancelar" class="eliminar">
        <?php } 
      }
    }
        ?>
  </form></td>
    </tr>
  </tbody>
</table>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <!-- END timeline item -->
                      <div>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" value='<?php echo $fila['correo'] ?>' disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="inputEmail" value='<?php echo $fila['telefono'] ?>'disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#perfil">
                  Editar datos
                </button>
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#foto_perfil">
                  Cambiar Foto de perfil
                </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
</div>
<?php
   include_once("sesiones.php");

   include_once("../bd/db.php");
   $consulta1="select * from usuarios where id_usuarios='$id_usuarios'";
   $resultado1=mysqli_query($conn,$consulta1);
   $entrar="";

   if ($fila1=mysqli_fetch_assoc($resultado1))
   {
       //regresa el registro de la consulta
   }


   if ($_SERVER["REQUEST_METHOD"]=="POST"){
       $telefono=$_POST['telefono'];
    $correo=$_POST['correo'];

       $consulta1="update usuarios set telefono='$telefono', correo='$correo' where id_usuarios='$id_usuarios'";

       $resultado1=mysqli_query($conn,$consulta1);

       if ($resultado1){
        $entrar="act_perf";
       }
       else{
        $entrar="error_perf";
       }


   }

?>
<div class="modal fade" id="perfil">
        <div class="modal-dialog modal-df">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Perfil</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
              <table>
              <tr>
               <th><label for="correolbl">Correo</label></td>
                <th><input class="form-control" type="email" name="correo" id="correolbl"  placeholder="correo" required pattern=".+@gmail\.com" value='<?php echo $fila['correo'] ?>' ></td>
            </tr>
            <tr>
               <th><label for="celularlbl">Celular</label></td>
                <th><input class="form-control" type="text" name="telefono" id="telefonolbl" pattern="[0-9]{10}" required placeholder="telefono" value='<?php echo $fila['telefono'] ?>' ></td>
            </tr>
            <tr>

                <th><input class="btn btn-info" type="submit" name="enviar" Value="Guardar"   ></td>

            </tr>
              </table>
  </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <div class="modal fade" id="foto_perfil">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Actualizar foto de perfil</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="subirfoto.php" method="post" enctype="multipart/form-data"> 
              <table>
              <tr>
               <th><label for="foto_perfillbl"></label></td>
                <th><input name="archivo" id="archivo" type="file" size="70" maxlength="70">
                <input type="reset" name="borrar" value="Cancelar" class="btn btn-danger"></th>
            </tr>
            <tr>

                <th><input class="btn btn-info" type="submit" name="enviar" Value="Guardar"></th>

            </tr>
              </table>
  </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<?php }

    }
    include_once("alertas.php");
?>
</body>
</html>