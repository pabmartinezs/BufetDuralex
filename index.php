<?php 
include 'Libreria.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>login</title>
        <link href="CSS/principal.css" rel="stylesheet" media="screen"> 
        <link href="CSS/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="CSS/bootstrap.css" rel="stylesheet" media="screen"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <script src="<?=URL?>js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?=URL?>js/validarRUT.js"></script>
     <body>
        <?php
            if(isset($_SESSION["USR"])){
        ?>
        <div><?php
                $oUsu=$_SESSION["USR"];
                echo $oUsu->nombreUser;
                ?>
            <a href="<?=URL?>Controlador/CerrarSession.php">Cerrar sesión</a>
        </div>
        <?php
        }
        if(!isset($_SESSION["USR"])){
        ?>
         <br/><br/><br/><br/><br/>
         <div class="container">
            <div class="col-lg-4"></div>
            <div class="text-center">
                <div class="col-lg-4">
                    <h3><b>Login</b></h3>
                </div>
            </div>
        </div> 
        <section class="container">
            <div class="col-lg-4"></div>
            <form name="formLogin" action="<?=URL?>Controlador/ValidaLogin.php" method="post" role="form" class="col-lg-4">
                <div class="form-group">
                    <label>R.U.T.: </label>
                    <input class="form-control" id="rut" type="text" name="rut" required oninput="checkRut(this)"/>
                </div>
                <div class="form-group">
                    <label>Contraseña: </label>
                    <input class="form-control" id="pass" type="password" name="pass"/>
                </div>
                <div class="form-group text-center">
                    <input class="form-group" id="enviar" type="button" value="Acceder"/>
                </div>
                <div class="form-group" id="msjweb"></div>
            </form>
        </section>
        <?php 
            }
           ?>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
             $("#enviar").click(function(){
                 if($("#rut").val()==="" || $("#pass").val()===""){
                     alert("¡Debes agregar un RUT y clave para poder ingresar!");
                 }
                 else{
                     $.ajax({url:"<?=URL?>Controlador/ValidaLogin.php"
                            ,type:"post"
                            ,data:{'rut':$("#rut").val(),
                                   'pass':$("#pass").val()}
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