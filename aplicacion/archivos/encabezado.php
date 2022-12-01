<?php
include_once("sesiones.php");
include_once("../bd/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema Gestor Documentos</title>
  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="icon" href="../css/utdnew.png">

  <!-- para sidebar -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


</head>
<style>
  @import url('https://fonts.googleapis.com/css?family=Montserrat|Montserrat+Alternates|Poppins&display=swap');
      *{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Montserrat Alternates', sans-serif;
	}
	body{
		background-color: white;
		background-size: 100vw 100vh;
		background-repeat: no-repeat;
	}
	.capa{
		position: fixed;
		width: 100%;
		height: 100vh;
		background: white;
		z-index: -1;
		top: 0;left: 0;
	}
	/*Estilos para el encabezado*/
	.header{
		width: 100%;
		height: 100px;
		position: fixed;
		top: 0;left: 0;
        background-color: #02a282 ;
	}
	.container{
		width: 90%;
		max-width: 1200px;
		margin: auto;
		display: contents;
	}
	
	.btn-menu {
		float: left;
		margin-right: 50px;
		text-align: left;
		
	}
	.nombre_usuario{
		margin-right: 30px;
	}
	.container .btn-menu label{
		color: rgb(0, 0, 0);
		font-size: 25px;
		cursor: pointer;
	}
	.logo {
		color: rgb(255, 255, 255);
		font-weight: 400;
		font-size: 22px;
		margin-left: 200px;
		margin-top: 20px;
		display: flex;
	}

	.utd{
		margin-right: auto;
		margin-left: 70px;
	}
	.container .menu{
		float: right;
		line-height: px;
		border-top: 50px;
	}
	.usuario{
		text-align: right;	
		text-decoration: none;
		color: rgb(255, 255, 255);
		transition: all 0.3s ease;
		border-bottom: 50px solid transparent;
		font-size: 24px;
		
	}
	.container .usuario h5{
		border-top: 50px;
		line-height: normal;
		text-decoration: none;
		color: rgb(0, 0, 0);
		transition: all 0.3s ease;
		border-bottom: 2px solid transparent;
		font-size: 35px;
		margin-right: 5px;
		background-color: #efb801;
		border-radius: 10px;
		box-shadow: black 15px;
		display: flex;
	}
	.container .usuario h5:hover{
		
		padding-bottom:px;
		box-shadow: black 15px;
		cursor: pointer;
		text-align: center;
        
	}
	/*Fin de Estilos para el encabezado*/

	/*Menù lateral*/
	#btn-menu{
		display: flex;
	}
	.container-menu{
		position: absolute;
		background: rgba(0,0,0,0.5);
		width: 100%;
		height: 100%;
		top: 0;left: 0;
		transition: all 500ms ease;
		opacity: 0;
		visibility: hidden;
	}
	#btn-menu:checked ~ .container-menu{
		opacity: 1;
		visibility: visible;
	}
	.cont-menu{
		width: 100%;
		max-width: 20%;
		background:white;
		position: relative;
		transition: all 500ms ease;
		transform: translateX(-100%);
        height: 100%;
        
	}
	#btn-menu:checked ~ .container-menu .cont-menu{
		transform: translateX(0%);
	}
	.cont-menu nav{
		transform: translateY(15%);
	}
	.cont-menu nav a{
		display: block;
		text-decoration: none;
		padding: 20px;
		color: #02a282;
		border-left: 5px solid transparent;
		transition: all 400ms ease;
        
	}
	.cont-menu nav a:hover{
		border-left: 5px solid #02a282;
		background: #efb801;
        font-weight: bold;
	}
	.cont-menu label{
		position: absolute;
		right: 5px;
		top: 10px;
		color: #02a282;
		cursor: pointer;
		font-size: 18px;
	}

	.tabla-planeaciones{
		text-align: center;
		justify-content: center;
		
	}
	.categorias{
		background-color: #efb801;
	}
	.columnas{
		background-color: #02a282;
		color: white;
	}

	.eliminar{
		background-color: rgb(255, 0, 0);
		width: 100%;
		height: 100%;
		cursor: pointer;
		color:white;
	}
	.tabla_actualizar{		
		text-align: center;
		justify-content: center;
		height: auto;
		width: auto;
	}
	.datos{
		text-align: center;
		justify-content: center;
	}
	.btn_acciones{
	background-color: blue;
	width: 100%;
	height: 100%;
	cursor: pointer;
	color:white;
	text-decoration: none;
	}
  .guardar{
    
      color: black;
      width: 100%;
      height: 100%;
      cursor: pointer;
      
  }
  .fonsai{
    font-size: 25px;
  }
  .title{
    padding-left: 1px;
  }
  .inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  .inputfile + label {
      font-size: 1.25em;
      font-weight: 700;
      color: white;
      background-color: #02a282;
      display: inline-block;
  }

  .inputfile:focus + label, .inputfile + label:hover {
      background-color: #efb801;
  }
  .inputfile + label {
    cursor: pointer; /* "hand" cursor */
  }
  .inputfile:focus + label {
    outline: 1px dotted #02a282;
    outline: -webkit-focus-ring-color auto 5px;
  }
  /*usuario*/


  /*Boton eliminar*/
  .inputfile-bor {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  .inputfile-bor + label {
      font-size: 1.25em;
      font-weight: 700;
      color: white;
      background-color: #02a282;
      display: inline-block;
  }

  .inputfile-bor:focus + label, .inputfile + label:hover {
      background-color: #efb801;
  }
  .inputfile-bor + label {
    cursor: pointer; /* "hand" cursor */
  }
  .inputfile-bor:focus + label {
    outline: 1px dotted #02a282;
    outline: -webkit-focus-ring-color auto 5px;
  }
  /*tarjetas de clases*/
  @import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');
  *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Montserrat', sans-serif;
  }
  
  @media only screen and (min-width:320px) and (max-width:768px){
    .container-card{
      flex-wrap: wrap;
    }
    .card{
      margin: 15px;
    }
  }
  .user{
    font-size: 30px;
    text-align: center;
    color: black;
  }

  .container-buscador {
      width: 50%;
    margin: auto;
      margin-top: 3vmin;
      display: inline-flex;
      height: max-content;
      justify-content: center;
      justify-items: center;

  }

  .buscador {
      margin-right: 3vmin;
      border: none;
      outline: none;
      width: 30vmin;
      line-height: 3vmin;
      text-align: left;
      padding: 1vmin;
      font-size: 3vmin;
  }
  .excel{
      justify-content: center;
      justify-items: center;
      text-decoration: none;
      color: #fff;
      background-color: rgb(90, 194, 95);
      border-radius: 4px;
      width: fit-content;
      height: max-content;
      padding: 1vmin;
      text-align: center;
      line-height: 3vmin;
      font-family: 'Montserrat', sans-serif;
      font-size: 3vmin;
      font-weight: 300;
      transition: all .4s ;
  }
  .excel:hover{
      background-color: rgb(46, 134, 61);
  }
  .pag_btn {
      border-radius: 4px;
      margin: 4px;
      padding: 5px;
      cursor: pointer;
      border: none;
      color: #000;
    }
    .pag_btn:hover{
  color: #fff;
      background-color: rgba(20, 9, 59, 0.959);
    }
    
   .pag_btn_des {
    border-radius: 4px;
    margin: 4px;
    padding: 5px;
    font-size: 14pt;
    cursor: pointer;
    border: none;
   }
    
   .numero_page{
    color: rgb(8, 7, 7);

    border-radius: 4px;
    margin: 4px;
    padding: 5px;
    cursor: pointer;
    border: none;
    
   }

</style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="bufalo.png" alt="AdminLTELogo" height="130" width="150">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li> -->
    <!-- <li class="nav-item">
      <em class="nav-link">Enable Dark Mode!</em>
    </li> -->
  </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <div class="theme-switch-wrapper nav-link">
        <label class="theme-switch" for="checkbox">
          <input type="checkbox" id="checkbox" class="">
          <span>Modo Oscuro</span>
        </label>
      </div>
    </li>
      <!-- Navbar Search -->
      <li class="nav-item">
        <div class="navbar-search-block">
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <?php if($rol=="estandar"){ ?>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-comments"></i>
        </a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="chartsjs.php" class="brand-link">
      <img src="../css/utdnew.png" height="20px" class="brand-image">
      <span class="brand-text font-weight-light">SGD</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <!-- Sidebar user panel (optional) -->
      <?php
        
include_once("../bd/db.php");
        $consulta="select * from usuarios where id_usuarios='$id_usuarios'";
        $resultado=mysqli_query($conn,$consulta);

            while($fila=mysqli_fetch_array($resultado)){
              $foto_perfil=['foto_perfil'];
        ?>
        <div class="image">
          <?php if($fila['foto_perfil']==null){?>
            <img src="bufalo.png" class="img-circle elevation-2" alt="Agregar Foto">

          <?php } else{?>
          <img src="<?php echo $fila['foto_perfil'] ?>" class="img-circle elevation-2" alt="Agregar Foto">
          <?php } ?>
        </div>
        <div class="info">
          <a href="perfil.php" class="d-block"><?php echo $usuarios ?></a>
        </div>
      </div>
<?php 
}
        
?>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="clases.php" class="nav-link"><i class="bi bi-book-half"></i>
              <p>
                Clases
        
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
          <?php if ($rol=="admin") { ?>
          </li>
          <?php } ?>

        <?php
          include_once("../bd/db.php");
          $entrar="";
          $consulta = "select a.id_carrera,a.nombre_c, b.id_clases, b.carrera, b.nombre_clase, b.ciclo from carreras a, clases b where a.id_carrera=b.carrera and docente='$id_usuarios'";

          $resultado = $conn->query($consulta);

          if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
          ?>
                
          <ul class="nav nav-treeview">
            <li class="list_inside">
              <a href="archivos.php?id_clases=<?php echo $fila['id_clases'] ?>" class="nav-link">
                <i class="bi bi-journal"></i>
                <p>
                  <?php echo $fila['nombre_clase'] ?>  
                </p>
              </a>
            </li>
          </ul>
        </li>
      </ul>

        <?php
            }
          }
        ?>


        <?php  if ($rol == "ptc" or $rol=="user") { ?>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeviewclass" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="datos_personales.php" class="nav-link"><i class="bi bi-person-lines-fill"></i><p>  Datos Personales</p></a>
            </li>
          </ul>
        <?php } ?>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeviewclass" role="menu" data-accordion="false">
          <li class="nav-item"><!-- ILUMINA LA SECCION ENTERA EN BLANCO -->
            <a href="subirinforme.php" class="nav-link"><i class="bi bi-archive"></i>
              <p>
                Informe
              </p>
            </a>
          </li>
        </ul>

        <?php if ($rol=="admin") { ?>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeviewclass" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="bi bi-person-badge"></i>
                <p> Docentes
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
                  
              <ul class="nav nav-treeview">
                <li class="list_inside">
                  <a href="agregar_usu.php" class="nav-link" ><i class="bi bi-plus-circle"></i><span class="brand-text font-weight-light">&nbsp;&nbsp;Nuevo</span></a> <!--EL LABEL SPAN PERMITE LA DESAPARICION DE TEXTO AL ESCONDER EL SIDEBAR -->
                          <!-- PONER ICONO ANTES DE SPAN PARA QUE NO SE ESCONDA -->
                </li>
                <li class="list_inside">
                  <a href="datos_personales.php" class="nav-link"><i class="bi bi-people"></i>
                    <span class="brand-text font-weight-light">&nbsp;&nbsp;Administrar</span></a>
                </li>
              </ul>
          </ul>
        </li>


        

              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeviewclass" role="menu" data-accordion="false">
        <li class="nav-item">
                      <a href="#" class="nav-link"><i class="bi bi-book"></i>
                      <p> Clases
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                      
                  <ul class="nav nav-treeview">
                      <li class="list_inside">
                          <a href="agregarclas.php" class="nav-link"><i class="bi bi-plus-circle"></i><span class="brand-text font-weight-light">&nbsp;&nbsp;Nuevo</span></a>
                      </li>

                      <li class="list_inside">
                          <a href="crudclases.php" class="nav-link"><i class="bi bi-bookshelf"></i><span class="brand-text font-weight-light">&nbsp;&nbsp;Administrar</span></a>
                      </li>
                  </ul>
        </ul>


        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeviewclass" role="menu" data-accordion="false">
        <li class="nav-item">
                      <a href="#" class="nav-link"><i class="bi bi-building"></i>
                      <p> Carreras
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                      
                  <ul class="nav nav-treeview">
                      <li class="list_inside">
                          <a href="crudcarreras.php" class="nav-link"><i class="bi bi-gear"></i><span class="brand-text font-weight-light">&nbsp;&nbsp;Administrar</span></a>
                      </li>
                  </ul>
        </ul>
        
        <?php if($rol="admin"){  ?>
        <li class="nav-item">
          <a href="selectidapi.php" class="nav-link"><i class="far fa-comments"></i>
            <p>
              Quejas y Sugerencias
            </p>
          </a>
        </li>
      <?php } ?>


          <?php } ?>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeviewclass" role="menu" data-accordion="false">
          <a href="salir.php" class="nav-link"><i class="bi bi-person-circle"></i>
                  <p>
                    Cerrar Sesión de: <?php echo $usuarios ?>
                    <!--<i class="fas fa-angle-left right"></i>-->
                  </p>
                </a>
          </ul>




		
		</nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
 
    <!-- /.content-header -->

    <!-- Main content -->
   
           
              
              <!-- /.footer -->
            
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- QUEJAS Y SUGERENCIAS -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    
    <br>
    <center> <h5>Quejas y Sugerencias</h5></center>
            <div class="card-body">
              <div class="form-group">
              
                <form action="https://formspree.io/f/mqkjgjad" method="POST" id="form1">
                  <form action="insertapi.php" method="POST" id="form2">
  <label>
    <input type="hidden" name="email" value="<?php echo $no_empleado ?>@gmail.com">
  </label>

              </div>
              <div class="form-group">
                <label for="inputDescription">Comentario</label>
                <!-- <textarea id="message" name="comentario" class="form-control" 
   maxlength="200" placeholder="Escriba aqui si tiene alguna queja o sugerencia respecto al sistema" rows="8">
</textarea> -->

<textarea name="message" class="form-control" id="coment1" maxlength="200" placeholder="Escriba aqui si tiene alguna queja o sugerencia respecto al sistema" rows="8"></textarea>

<script src="foranea.js"></script>

<span class="help-block">
  <p id="mensaje_ayuda" class="help-block">Cuerpo del mensaje de alerta</p>
</span>

      </div>
                <div class="form-group">
          <input type="submit" onclick="submitForms()" value="Enviar" class="btn btn-success float-right">
        </div>
      </div>
              </div>
              </div>
              </form>
        </form>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
<script>
  var toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
  var currentTheme = localStorage.getItem('theme');
  var mainHeader = document.querySelector('.main-header');

  if (currentTheme) {
    if (currentTheme === 'dark') {
      if (!document.body.classList.contains('dark-mode')) {
        document.body.classList.add("dark-mode");
      }
      if (mainHeader.classList.contains('navbar-light')) {
        mainHeader.classList.add('navbar-dark');
        mainHeader.classList.remove('navbar-light');
      }
      toggleSwitch.checked = true;
    }
  }

  function switchTheme(e) {
    if (e.target.checked) {
      if (!document.body.classList.contains('dark-mode')) {
        document.body.classList.add("dark-mode");
      }
      if (mainHeader.classList.contains('navbar-light')) {
        mainHeader.classList.add('navbar-dark');
        mainHeader.classList.remove('navbar-light');
      }
      localStorage.setItem('theme', 'dark');
    } else {
      if (document.body.classList.contains('dark-mode')) {
        document.body.classList.remove("dark-mode");
      }
      if (mainHeader.classList.contains('navbar-dark')) {
        mainHeader.classList.add('navbar-light');
        mainHeader.classList.remove('navbar-dark');
      }
      localStorage.setItem('theme', 'light');
    }
  }

  toggleSwitch.addEventListener('change', switchTheme, false);
</script>

<script>
$('#mensaje_ayuda').text('200 carácteres restantes');
  $('#message').keydown(function () {
      var max = 200;
      var len = $(this).val().length;
      if (len >= max) {
          $('#mensaje_ayuda').text('Has llegado al límite');// Aquí enviamos el mensaje a mostrar          
          $('#mensaje_ayuda').addClass('text-danger');
          $('#message').addClass('is-invalid');
          $('#inputsubmit').addClass('disabled');    
          document.getElementById('inputsubmit').disabled = true;                    
      } 
      else {
          var ch = max - len;
          $('#mensaje_ayuda').text(ch + ' carácteres restantes');
          $('#mensaje_ayuda').removeClass('text-danger');            
          $('#message').removeClass('is-invalid');            
          $('#inputsubmit').removeClass('disabled');
          document.getElementById('inputsubmit').disabled = false;            
      }
  }); 
  </script>