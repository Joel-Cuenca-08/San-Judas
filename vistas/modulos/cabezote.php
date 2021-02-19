<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark border-bottom-0">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><span
                    class="navbar-toggler-icon"></span></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <span class="d-md-inline"><i class="fas fa-user"></i>&nbsp;
                        <?=$_SESSION["NOMBRE"]?> <?=$_SESSION["APELLIDO"]?> </span> &nbsp;<i class="fas fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right"> 
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="salir" class="btn btn-danger btn-block float-right ">Cerrar
                            Sesion&nbsp; <i class="fas fa-sign-out-alt"></i></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->