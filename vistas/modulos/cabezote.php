<header class="main-header">
    <!---========================
            LOGOTIPO
    ==========================-->

    <a href="inicio" class="logo">
        <!--logo mini-->
        <span class="logo-mini">
            <img src="vistas/img/plantilla/icono-sj.png" class="img-responsive"
            style="padding:0px 0px">
        </span>
        
        <!--logo normal-->
        <span class="logo-lg">
            <img src="vistas/img/plantilla/icono-sj2.png" class="img-responsive"
            style="padding:15px 0px" >
        </span>
    </a>

     <!---========================
           BARRA DE NAVEGACION
    ==========================-->
    <nav class="navbar navbar-static-top bg-success" role="navigation">
            
            <!-- Botón de Navegación -->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
               
                <span class="sr-omly">Menu</span>
           
            </a>

            <!-- Perfil de usuario -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="vistas/img/usuarios/default/anonymous.png" class="user-image">

                            <span class="hidden-xs"><?=$_SESSION["NOMBRE"].' '.$_SESSION["APELLIDO"];?></span>
                        </a>


                        <!--Dropdown- toggle -->
                         <ul class="dropdown-menu">
                
                                <li class="user-body">
                                    <div class="pull-right">
                                        <a href="salir" class="btn btn-default btn-flat">Salir</a>
                                    </div>
                                </li>

                          </ul>
                    </li>

                </ul>
            </div>

            
    </nav>
</header>