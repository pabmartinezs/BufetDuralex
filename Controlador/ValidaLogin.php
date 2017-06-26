<?php
    session_start();

    include '../Libreria.php';

    $oUsuario=new Usuario($_REQUEST["rut"],$_REQUEST["pass"]);
    $oCliente=new Cliente($_REQUEST["rut"],$_REQUEST["pass"]);
    if($oUsuario->ValidarAcceso()){
        $_SESSION["USR"]=$oUsuario;
        echo 'Correcto!!!';
    }
    else{
        if($oCliente->ValidarAcceso()){
        $_SESSION["USR"]=$oCliente;
        echo 'Correcto!!!';
        }else{
            echo "Error no se encuentra registrado en la base de datos.";  
        }
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

