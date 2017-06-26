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
    <body>
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
                    <div class="col-md-1"></div>
                    <div class="text-center">
                        <div class="col-lg-6 center-block">
                            <h3 style="color: #000000"><b>Consultar Atención</b></h3>
                            <form name="formMiConsulta" role="form" class="col-lg-12" method="POST" action="<?=URL?>Controlador/MiConsultaAtencion.php">
                                <table class="table table-info" id="tablaFormastoA">
                                    <tr>
                                        <td><div class="form-group">Ingrese Número de Atención:</div></td>
                                        <td><div class="form-group">
                                                <input class="form-group" type="number" id="txtconsultarMiAtencion" name="txtconsultarMiAtencion" required="" />
                                            </div>
                                        </td>
                                        <td><div class="form-group"></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="form-group"></div></td>
                                        <td><div class="form-group">
                                                <input class="form-group" id="Mconsulta" type="button" value="Consultar"/>
                                            </div>
                                        </td>
                                        <td><div class="form-group"></div></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
             $("#Mconsulta").click(function(){
                 if($("#txtconsultarMiAtencion").val()===""){
                     alert("¡Debes agregar un número de solicitud!");
                 }
                 else{
                     $.ajax({url:"<?=URL?>Controlador/MiConsultaAtencion.php"
                            ,type:"post"
                            ,data:{'rut':$("#txtconsultarMiAtencion").val()}
                            ,success:function(resweb){
                                $('#msjweb').html(resweb);
                                if(resweb==="Correcto!!!"){
                                    location.href="<?=URL?>Admin.php";
                                }
                            }
                        });//Cierre AJAX                     
                 }
            });//Click del botón  
        });//Ready del document
    </script>
</html>
