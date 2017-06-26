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
            <div id="menulateral"><?php include('Menu.php');?></div>
            <div id="contenido">
                <div class="container">
                    <div class="text-center">
                        <div class="col-lg-10 center-block">
                            <h3 style="color: #000000"><b>Listado de Abogados</b></h3>
                                <table class="table table-hover active" id="tablaFormastoA">
                                    <thead>
                                        <tr>
                                            <th><div class="col-lg-2 center-block">Número Usuario</div></th>
                                            <th><div class="col-lg-2 center-block">RUT Usuario</div></th>
                                            <th><div class="col-lg-2 center-block">Password</div></th>
                                            <th><div class="col-lg-2 center-block">Nombre Usuario</div></th>
                                            <th><div class="col-lg-2 center-block">Perfil</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $oListado=new Usuario();
                                            $row = $oListado->ListarUsuarios();
                                            if(count($row)>=1){
                                                foreach ($oListado->ListarUsuarios() as $oElemento) { ?>
                                                <tr>
                                                    <td><?php echo "<div>".$oElemento->idusuario ."</div>";?></td>
                                                    <td><?php echo "<div>".$oElemento->rutusuario ."</div>";?></td>
                                                    <td><?php echo "<div>".$oElemento->pass ."</div>";?></td>
                                                    <td><?php echo "<div>".$oElemento->nombreusuario."</div>";?></td>
                                                    <td><?php echo "<div>".$oElemento->idperfilusuario ."</div>";?></td>
                                                </tr>
                                                <?php }
                                            }else{
                                                echo "<table><tr><td><div>". "No hay registros de Usuarios" ."</div></td></tr></table>";
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