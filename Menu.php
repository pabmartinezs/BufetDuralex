<nav class="navbar navbar-default" role="navigation" >
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a id="contMenu" href="Admin.php"><span class="glyphicon glyphicon-home"></span><i class="fa fa-home fa-2x"> HOME </i> </a><br/>
    </div>
    <br/><br/>
<div class="collapse navbar-collapse navbar-ex1-collapse"> 
    <ul class="nav navbar-collapse">  
        <?php 
        $oUsu=$_SESSION["USR"];
        if ($oUsu->perfilUser=='1'){ ?>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="VerClientes.php" ><i class="fa fa-gavel fa-2x">Listar Clientes </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="ConsultarCliente.php" ><i class="fa fa-gavel fa-2x">Consultar Clientes </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="VerAbogados.php" ><i class="fa fa-gavel fa-2x">Listar Abogados </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#" ><i class="fa fa-gavel fa-2x">Consultar Abogados </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="VerAtenciones.php" ><i class="fa fa-gavel fa-2x">Listar Atenciones </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#" ><i class="fa fa-gavel fa-2x">Consultar Atenciones </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#" ><i class="fa fa-gavel fa-2x">Estadisticas del sistema </i></a><br/>
        <?php } 
        if ($oUsu->perfilUser=='2'){?>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="VerClientes.php"><i class="fa fa-gavel fa-2x">Listar Clientes </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="ConsultarCliente.php"><i class="fa fa-gavel fa-2x">Consultar Clientes </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#"><i class="fa fa-gavel fa-2x">Registrar Clientes </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#"><i class="fa fa-gavel fa-2x">Eliminar Clientes </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="VerAbogados.php"><i class="fa fa-gavel fa-2x">Listar Abogados </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#"><i class="fa fa-gavel fa-2x">Consultar Abogados </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#"><i class="fa fa-gavel fa-2x">Registrar Abogados </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#"><i class="fa fa-gavel fa-2x">Eliminar Abogados </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="VerUsuarios.php"><i class="fa fa-gavel fa-2x">Listar Usuarios </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#"><i class="fa fa-gavel fa-2x">Consultar Usuarios </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#"><i class="fa fa-gavel fa-2x">Registrar Usuarios </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#"><i class="fa fa-gavel fa-2x">Eliminar Usuarios </i></a><br/>
        <?php }
        if ($oUsu->perfilUser=='3'){?>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="VerClientes.php"><i class="fa fa-gavel fa-2x">Listar Clientes </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="ConsultarCliente.php"><i class="fa fa-gavel fa-2x">Consultar Clientes </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="VerAbogados.php"><i class="fa fa-gavel fa-2x">Listar Abogados </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#"><i class="fa fa-gavel fa-2x">Consultar Abogados </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="VerAtenciones.php"><i class="fa fa-gavel fa-2x">Listar Atenciones </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#"><i class="fa fa-gavel fa-2x">Consultar Atenciones </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#"><i class="fa fa-gavel fa-2x">Agendar Atenciones </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#"><i class="fa fa-gavel fa-2x">Confirmar Atenciones </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="#"><i class="fa fa-gavel fa-2x">Anular Atenciones </i></a><br/>
        <?php }
        if ($oUsu->perfilUser=='4'){?>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="MisAtenciones.php"><i class="fa fa-gavel fa-2x">Listar Mis Atenciones </i></a><br/>
        <span class="glyphicon glyphicon-menu-right"></span><a id="contMenu" href="ConsultarAtenciones.php"><i class="fa fa-gavel fa-2x">Consultar Mis Atenciones </i></a><br/>
        <?php } ?>
    </ul>
</div>
</nav>