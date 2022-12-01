<?php
include_once('sesiones.php');
include_once('encabezado.php');
include_once('../bd/db.php');

$id_usuarios = $_GET['id_usuarios'];


$consulta = "select * from usuarios where id_usuarios='$id_usuarios'";
$resultado = mysqli_query($conexion, $consulta);

if ($fila = mysqli_fetch_assoc($resultado)) {
   
}
?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Usuario</title>
    <link rel="stylesheet" href="estilardos.css">
</head>

<body>
<center>
    <br> <br> <br>
    <h1> Datos De Usuario </h1>

    <div id="" class="">
        <div class="">
           <table class="">
            <br>
            <br>
            <br>
            <br>
            <br>
            <tr>
                <td> RFC: </td>
                <td style="text-align: center;"> <?php echo $fila['rfc']  ?> </td>
            </tr>

            <tr>
                <td> Nombre: </td>
                <td style="text-align: center;"> <?php echo $fila['nombre_u']  ?> </td>
            </tr>

            <tr>
                <td> Apellido Paterno: </td>
                <td style="text-align: center;"> <?php echo $fila['ape_1']  ?> </td>
            </tr>
            <tr>
                <td> Apellido Materno: </td>
                <td style="text-align: center;"> <?php echo $fila['ape_2']  ?> </td>
            </tr>
            <tr>
                <td> Privilegio: </td>
                <td style="text-align: center;"> <?php echo $fila['rol']  ?> </td>
            </tr>
            <tr>
                <td> Celular: </td>
                <td style="text-align: center;"> <?php echo $fila['celular']  ?> </td>
            </tr>

           </table>
            <br>
            <br>
            <a class="button1" href="datos_personales.php"> <input type="button"  value="Regresar"> </a>
        </div>
    </div>
    <input type="hidden" name="id_usuarios" Value="<?php echo $fila['id_usuarios'] ?> ">
    </center>
</body>

</html>
</head>
<body>
    
</body>
</html>