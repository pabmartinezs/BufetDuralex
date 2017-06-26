<?php 
class Atencion{
    var $id_registro;
    var $fecha_atencion;
    var $id_cliente;
    Var $id_abogado;
    var $id_estado;
    
    public function __construct($lidRegistro="",$lidCliente="") {
        $this->idregistro = $lidRegistro;
        $this->idcliente = $lidCliente;
    }
    public function ConsultarAtencionID(){
        $oConn=new Conexion();
        if($oConn->Conectar()){
            $db=$oConn->objconn;            
        }else{return false;}
        $sqli="SELECT * FROM Registro WHERE id_cliente='$this->idcliente' and id_registro='$this->idregistro'";
        $resultado=$db->query($sqli);
        $i=0;
        while($row=$resultado->fetch_assoc()){
              $oReg=new Atencion();
              $oReg->idregistro=$row["id_registro"];
              $oReg->fechatencion=$row["fecha_atencion"];
              $oReg->idcliente=$row["id_cliente"];
              $oReg->idabogado=$row["id_abogado"];
              $oReg->idestado=$row["id_estado"];
              $arrAtencion[$i]=$oReg;
              $i++;
        }if (isset($arrAtencion)) {return $arrAtencion; }else {return null;}
    }
    
    public function ListarAtencion(){
        $oConn=new Conexion();
        if($oConn->Conectar()){
            $db=$oConn->objconn;            
        }else{return false;}
        $sqli="SELECT * FROM Registro";
        $resultado=$db->query($sqli);
        $i=0;
        while($row=$resultado->fetch_assoc()){
              $oReg=new Atencion();
              $oReg->idregistro=$row["id_registro"];
              $oReg->fechatencion=$row["fecha_atencion"];
              $oReg->idcliente=$row["id_cliente"];
              $oReg->idabogado=$row["id_abogado"];
              $oReg->idestado=$row["id_estado"];
              $arrAtencion[$i]=$oReg;
              $i++;
        }if (isset($arrAtencion)) {return $arrAtencion; }else {return null;}
    }
    public function ListarAtencionCliente(){
        $oConn=new Conexion();
        if($oConn->Conectar()){
            $db=$oConn->objconn;            
        }else{return false;}
        $sqli="SELECT * FROM Registro WHERE id_cliente='$this->id_cliente'";
        $resultado=$db->query($sqli);
        $i=0;
        while($row=$resultado->fetch_assoc()){
              $oReg=new Atencion();
              $oReg->idregistro=$row["id_registro"];
              $oReg->fechatencion=$row["fecha_atencion"];
              $oReg->idcliente=$row["id_cliente"];
              $oReg->idabogado=$row["id_abogado"];
              $oReg->idestado=$row["id_estado"];
              $arrAtencion[$i]=$oReg;
              $i++;
        }if (isset($arrAtencion)) {return $arrAtencion; }else {return null;}
    }
    
}

