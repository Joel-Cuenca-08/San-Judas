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
    <!-- Sweet Alert-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
    <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css" />
    <!-- AdminLTE for demo purposes -->
    <script src="vistas/dist/js/demo.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net/1.10.21/jquery.dataTables.min.js"
        integrity="sha512-KpU5s1pqURKNsloidq93ZyPKjZga0NgcRIberz+pZrt9e4JVpkZNYkd307Kl0G2cSc9YzLlRO85bIjBcxanG4g=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs4/1.10.21/dataTables.bootstrap4.min.js"
        integrity="sha512-WXfSybtdGfHX+J6j+y4Jr7LFrnMpudnY0ez02tWI0mlyPEKE0b15qGfNFY+/H6mswu//i9c1t4MKf+JFSuzgVQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-responsive/2.2.5/dataTables.responsive.min.js"
        integrity="sha512-+lcEupw9bvzdp2Ey2GU0VfC7kvjySIYdCC4higXahhw8zUPKO1TUG8O3xf3QZV8rUwQjF5CgJR6V43r/JRhR3w=="
        crossorigin="anonymous"></script>
    <script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/b5c75f0bc8.js" crossorigin="anonymous"></script>
    <!-- Plugin overlayScrollbars -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/css/OverlayScrollbars.css"
        integrity="sha512-Ho1L8FTfzcVPAlvfkL1BV/Lmy1JDUVAP82/LkhmKbRX5PnQ7CNDHAUp2GZe7ybBpovS+ssJDf+SlBOswrpFr8g=="
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/OverlayScrollbars.js"
        integrity="sha512-5jCo7FSgnSK+019/iHPtV/7Ov8lSSXjeZDVLI8lIk6dkp2B2k/p0wX47hWMyWWT9LTLanRsd2izrwqcWgd7Jog=="
        crossorigin="anonymous"></script>
    <!-- DataTables Excel-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/1.6.2/js/dataTables.buttons.min.js"
        integrity="sha512-YE4+14g9xQWsnnF/1hQ+h7rhZEu113qaL73REt2oWyPq0K/K54hkiLzNoo1KDFQi/TNc8Wzrj2QtSVEcDlyOBw=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script> 
    <!-- Inputmask-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.3/jquery.inputmask.min.js"
        integrity="sha512-16cQU/sze5bIFvV74riJ7qh6hFlqQYjjyEUrtsSkj8PtN62QukBODV0bui4+gbx2G4OwB+rSoYgJCLHulU864A=="
        crossorigin="anonymous"></script>
    <!-- Select2-->
    <link href="vistas/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <!-- Usuario -->
    <script src="vistas/js/usuario.js"></script>
    <script src="vistas/js/persona.js"></script>
    <script src="vistas/js/plantilla.js"></script>

</head>


<!--======================================
    CUERPO DOCUMENTO
  ========================================-->

<body style="height: auto;" class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">


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
        echo '<div class="login-page">';
        include "modulos/login.php";
        echo '</div>';
      }


  ?>


<script>
    (function($) {
        "use strict";
        $('.Scroll').overlayScrollbars({
            className: "os-theme-dark",
            scrollbars: {
                clickScrolling: true
            }
        })
    })(jQuery)
    </script>
</body>

</html>