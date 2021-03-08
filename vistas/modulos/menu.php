 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-warning">
     <!-- Brand Logo -->
     <a href="#" class="brand-link">
         <img src="vistas/img/plantilla/icono-sj3.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text font-weight-light">San judas tadeo</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">

                 <?php if($_SESSION["Perfil"] =="Administrador" || $_SESSION["Perfil"] =="Especial"){

                 echo '<li class="nav-item">
                     <a class="nav-link" href="inicio">
                         <i class="nav-icon fa fa-home"></i>
                         <p>Inicio</p>
                     </a>

                 </li>

                 <li class="nav-item">
                     <a class="nav-link" href="personas">
                         <i class="nav-icon fas fa-user-edit"></i>
                         <p>Personas</p>
                     </a>

                 </li>';}

                if($_SESSION["Perfil"] =="Administrador"){
                 echo '<li class="nav-item">
                     <a class="nav-link" href="usuarios">
                         <i class="nav-icon fa fa-user"></i>
                         <p>Usuarios</p>
                     </a>

                 </li>';}

                if($_SESSION["Perfil"] =="Administrador" || $_SESSION["Perfil"] =="Especial"){
                
                    echo '
                 <li class="nav-item">
                     <a class="nav-link" href="propietarios">
                         <i class="nav-icon fas fa-id-card-alt"></i>
                         <p>Propietarios</p>
                     </a>

                 </li>

                 <li class="nav-item">
                     <a class="nav-link" href="administrativos">
                         <i class="nav-icon fas fa-user-shield"></i>
                         <p>Administrativos</p>
                     </a>

                 </li>';}
                 if($_SESSION["Perfil"] =="Administrador" || $_SESSION["Perfil"] =="Especial" || $_SESSION["Perfil"] =="Digitador"){
                
                echo '<li class="nav-item">
                    <a class="nav-link" href="conductores">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Conductores</p>
                    </a>

                </li>

                 <li class="nav-item">
                     <a class="nav-link" href="vehiculos">
                         <i class="nav-icon fas fa-bus-alt"></i>
                         <p>Vehiculos</p>
                     </a>

                 </li>';}

                 if($_SESSION["Perfil"] =="Administrador" || $_SESSION["Perfil"] =="Especial" || $_SESSION["Perfil"] =="Digitador"){
                
                    echo '
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Ruta
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     
                     <ul class="nav nav-treeview">';}
                     if($_SESSION["Perfil"] =="Digitador"){
                        echo '
                         <li class="nav-item">
                             <a href="rutas" class="nav-link">
                                 <i class="nav-icon fas fa-road"></i>
                                 <p>
                                     Agregar Ruta
                                 </p>
                             </a>
                         </li>';}
                         if($_SESSION["Perfil"] =="Administrador" || $_SESSION["Perfil"] =="Especial"){
                         echo '<li class="nav-item">
                             <a href="detalleRuta" class="nav-link ">
                                 <i class="fas fa-history"></i>
                                 <p>
                                     Historial de Ruta
                                 </p>
                             </a>
                         </li>
                         

             </ul>
             </li>';
            }
             if($_SESSION["Perfil"] =="SuperAdmin"){
             echo'<li class="nav-item">
                 <a class="nav-link" href="#">
                     <i class="nav-icon far fa-calendar-times"></i>
                     <p>Periodo</p>
                 </a>

             </li>';}
             ?>
             </ul>
             </section>
 </aside>