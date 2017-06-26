<?php
/*Si no esta hecho el login se regresa a la página principal*/
include 'Libreria.php';
session_start();
if(!isset($_SESSION["USR"])){         
    header('Location: '.URL);
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>home</title>
        <link href="CSS/principal.css" rel="stylesheet" media="screen"> 
        <link href="CSS/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="CSS/bootstrap.css" rel="stylesheet" media="screen"> 
    </head>
    <body id="bufetabogadobody">
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="<?=URL?>js/jquery-3.2.1.min.js"></script>
        <script src="<?=URL?>js/bootstrap.min.js"></script>
        <script src="<?=URL?>js/validarRUT.js"></script>
        <?php
            if(isset($_SESSION["USR"])){
        ?>
        <div id="contenedor">
            <div id="header">
                <h2>
                    <span class="glyphicon glyphicon-user"></span>
                    <?php
                        $oUsu=$_SESSION["USR"];
                        echo $oUsu->nombreUser;
                    ?>
                    <a href="<?=URL?>Controlador/CerrarSession.php">Cerrar sesión<span class="glyphicon glyphicon-off"></span></a> 
                    <?php }?>
                </h2>
            </div>
            <div id="menulateral"><?php include('Menu.php');?></div>
            <div id="contenido">
                <div class="container">
                    <div class="col-md-1"></div>
                    <div class="text-center">
                        <div class="col-lg-6 center-block">
                            <h3 style="color: #000000"><b>Consultar Cliente</b></h3>
                            <form name="formMiConsulta" role="form" class="col-lg-12" method="POST" action="<?=URL?>Controlador/BuscarCliente.php">
                                <table class="table table-info" id="tablaFormastoA">
                                    <tr>
                                        <td><div class="form-group">Ingrese R.U.T. Cliente:</div></td>
                                        <td><div class="form-group">
                                                <input class="form-group" type="text" id="txtRutClienteBuscar" oninput="checkRut(this)" name="txtRutClienteBuscar" required="" />
                                            </div>
                                        </td>
                                        <td><div class="form-group"></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="form-group"></div></td>
                                        <td><div class="form-group">
                                                <input class="form-group" id="CConsulta" type="submit" value="Consultar"/>
                                            </div>
                                        </td>
                                        <td><div class="form-group"></div></td>
                                    </tr>
                                </table>
                            </form>
                            <?php 
                            if(isset($_SESSION["CLIBUSCADO"])){ 
                                $infoCliente = $_SESSION["CLIBUSCADO"];
                                ?>
                            <div id="MostrarResultadoConsulta" class="text-left" id="tablaFormastoA">
                                <table class="table table-info">
                                    <tr>
                                        <td><div class="form-group">ID: </div></td>
                                        <td><?php echo "";?></td>
                                    </tr>
                                    <tr>
                                        <td><div class="form-group">R.U.T.: </div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="form-group">Nombre: </div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="form-group">Fecha de Ingreso: </div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="form-group">Tipo Persona: </div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="form-group">Dirección: </div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="form-group">Teléfono: </div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="form-group">Perfil: </div></td>
                                    </tr>
                                </table>
                            </div>
                                <?php unset($_SESSION["CLIBUSCADO"]);}?>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </body>
</html>