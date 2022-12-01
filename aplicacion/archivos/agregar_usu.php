<?php
include_once('encabezado.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<title>Usuario</title>
  <link rel="stylesheet" href="estilardos.css">
  
</head>
<body>
    <center>	
    <br>
    <br>
    <br>
    <br>
	
	<div >
	     <form method="post" action="files/agregar.php">
		 <h2 align="center">Agregar nuevo "Usuario"</h2>
     <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="datos_personales.php">Administrar</a></li>
              <li class="breadcrumb-item active">Nuevo</li>
            </ol>
		 
            <table align="center">
              <tr>
                <td><label>Nombres</label></td>
                <td><input type="text" class="form-control" placeholder="Nombres" name="nombre" required></td>
              </tr>
            <tr>
                  <td><label>Apellidos</label></td>
                  <td><input type="text" class="form-control" placeholder="Apellidos" name="apellidos" required></td>
                </tr>
              </div>
              <div class="form-group">
                <tr>
                  <td><label>Contraseña</label></td>
                  <td><input type="password" class="form-control" placeholder="contraseña" name="password" required></td>
                </tr>
                <tr>
                  <td><label>No. Empleado</label></td>
                  <td><input type="text" class="form-control" placeholder="No. Empleado" name="no_empleado" id="nombre1" required></td>
                </tr>
                <tr>
                  <td><label>Rol </label></td>
                  <td><select name="rol" class="form-control" required>
	                  <option value="admin">admin</option> 
	                  <option value="estandar">estandar</option> 
                    
	                </select> </td>
                </tr>
                <tr>
                  <td><label>Estatus </label></td>
                  <td><select name="estatus" class="form-control" required>
	                  <option value="activo">Activo</option> 
	                  <option value="inactivo">Inactivo</option> 
                   
	                </select> </td>
                </tr>

                <tr>
                  <td><label>Telefono</label></td>
                  <td><input type="text" class="form-control" placeholder="Telefono" name="telefono" pattern="[0-9]{10}" required></td>
                </tr>
                <tr>
                  <td><label>Correo</label></td>
                  <td><input type="email" class="form-control" placeholder="correo" name="correo" pattern=".+@gmail\.com" required ></td>
                </tr>
<tr>
  <td>
    <?
    isset($_POST["Enviar"]);
			mkdir($_POST["nombre2"], 755);
	?>
	<input type="hidden" name="nombre2" id="nombre2">
  </td>
</tr>
                

                    <td><a class="btn btn-secondary"href="clases.php">Volver</a></td>
                </tr>
            </table>
            <input type="hidden" name="tab" value="a">
          </form>
		</div>
    
    <input type="submit" name="Enviar" id="Enviar" class="btn-primary" value="Enviar">

    </center>
</body>

</html>
<script src="foranea.js"></script>