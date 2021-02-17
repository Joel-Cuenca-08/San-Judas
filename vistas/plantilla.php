<?php 
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>San Judas Tadeo S.A.</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="vistas/img/plantilla/icono-sj.png">
    <!--================================ 
    PLUGINS DE CSS
  ====================================-->
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
     <!-- Ionicons -->
    <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
   <!-- DataTables -->
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
    <!--Iconos FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
        integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <!--================================ 
    PLUGINS DE JAVASCRIPT
  ====================================-->
    <!-- jQuery 3 -->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 
    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="vistas/dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <!--SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <!-- Usuario -->
    <script src="vistas/js/usuario.js"></script>

</head>


<!--======================================
    CUERPO DOCUMENTO
  ========================================-->

<body class="hold-transition skin-yellow sidebar-collapse sidebar-mini login-page">


    <?php

      if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] === "ok")
      {

        echo '<div class="wrapper">';
        /**==========================
              CABEZOTE 
        ============================*/
        include "modulos/cabezote.php";


        /**==========================
              MENU 
        ============================*/
        include "modulos/menu.php";


        /**==========================
             Contenido 
        ============================*/
        if(isset($_GET["ruta"])){
//estoy que le agrego === porque es mas rapido al validar
          if($_GET["ruta"] === "inicio" ||
            $_GET["ruta"] === "usuarios" || 
            $_GET["ruta"] === "personas" ||
            $_GET["ruta"] === "conductores" ||
            $_GET["ruta"] === "vehiculos" ||
            $_GET["ruta"] === "rutas" ||
            $_GET["ruta"] === "periodos" ||
            $_GET["ruta"] === "propietarios"||
            $_GET["ruta"] === "administrativos"||
            $_GET["ruta"] === "salir"){
            
            include "modulos/".$_GET["ruta"].".php";
          }else{
            include "modulos/404.php";
          }
          
        }else{
          include "modulos/inicio.php";
        }

        /**==========================
            FOOTER
        ============================*/
        include "modulos/footer.php";

        echo '</div>';
      
      }else{
        include "modulos/login.php";
      }


  ?>



    <script src="vistas/js/plantilla.js"></script>
</body>

</html>