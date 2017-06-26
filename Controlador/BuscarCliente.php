<?php
session_start();

    include '../Libreria.php';
    //echo $_POST["txtRutClienteBuscar"];

    $oCliente = new Cliente();
    if($oCliente->BuscarCliente($_POST["txtRutClienteBuscar"])){
        $row=$oCliente->BuscarCliente($_POST["txtRutClienteBuscar"]);
        $_SESSION["CLIBUSCADO"]=$oCliente;
        $oCLI=$_SESSION["CLIBUSCADO"];
        echo $oCLI->idcliente;
        //echo "hola ".$oCliente;
        //header("Location: ../ConsultarCliente.php");
    }else{
        //echo "ERROR: El usuario no esta registrado.";
        $_SESSION["MSGERRORCLIENTE"]="ERROR: El usuario no esta registrado.";
        //header("Location: ../CosultarCliente.php");
    }
    

