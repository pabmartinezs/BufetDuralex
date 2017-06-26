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
            <br/>
            <div id="menulateral"><?php include('Menu.php');?></div>
            <br/>
            <div id="contenido">
                <div class="container">
                    <div class="text-center">
                        <div class="col-lg-10 center-block">
                            <h3 style="color: #000000"><b>Listado de Clientes</b></h3>
                                <table class="table table-hover active" id="tablaFormastoA">
                                    <thead>
                                        <tr>
                                            <th><div class="col-lg-2 center-block">Número Cliente</div></th>
                                            <th><div class="col-lg-2 center-block">RUT Cliente</div></th>
                                            <th><div class="col-lg-2 center-block">Nombre Cliente</div></th>
                                            <th><div class="col-lg-2 center-block">Fecha Ingreso</div></th>
                                            <th><div class="col-lg-2 center-block">Tipo Persona</div></th>
                                            <th><div class="col-lg-2 center-block">Dirección</div></th>
                                            <th><div class="col-lg-2 center-block">Teléfono</div></th>
                                            <th><div class="col-lg-2 center-block">Perfil</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $oListado=new Cliente();
                                            $row = $oListado->ListarClientes();
                                            if(count($row)>=1){
                                                foreach ($oListado->ListarClientes() as $oElemento) { ?>
                                                <tr>
                                                    <td><?php echo "<div>".$oElemento->idcliente ."</div>";?></td>
                                                    <td><?php echo "<div>".$oElemento->rutcliente ."</div>";?></td>
                                                    <td><?php echo "<div>".$oElemento->nombrecliente ."</div>";?></td>
                                                    <td><?php echo "<div>".$oElemento->fechaingreso."</div>";?></td>
                                                    <td><?php echo "<div>".$oElemento->tipopersona ."</div>";?></td>
                                                    <td><?php echo "<div>".$oElemento->direccion ."</div>";?></td>
                                                    <td><?php echo "<div>".$oElemento->telefono ."</div>";?></td>
                                                    <td><?php echo "<div>".$oElemento->perfil ."</div>";?></td>
                                                </tr>
                                                <?php }
                                            }else{
                                               echo "<table><tr><td><div>". "No hay registros de Clientes" ."</div></td></tr></table>";
                                            }
                                            ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </body>
</html>

