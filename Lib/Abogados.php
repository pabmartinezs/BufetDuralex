<?php 
class Abogado{
    var $id_atencion;
    var $rut_abogado;
    var $password;
    Var $nombre_abogado;
    var $fecha_contrato;
    var $id_especialidad;
    var $valor_hora;
    
    public function __construct() {
    }
    
    public function ListarAbogados(){
        $oConn=new Conexion();
        if($oConn->Conectar()){
            $db=$oConn->objconn;            
        }else{return false;}
        $sqli="SELECT * FROM atencion JOIN especialidad ON(atencion.id_especialidad=especialidad.id_especialidad)";
        $resultado=$db->query($sqli);
        $i=0;
        while($row=$resultado->fetch_assoc()){
              $oAbo=new Abogado();
              $oAbo->idabogado=$row["id_atencion"];
              $oAbo->rutabogado=$row["rut_abogado"];
              $oAbo->nombreabogado=$row["nombre_abogado"];
              $oAbo->fechacontrato=$row["fecha_contrato"];
              $oAbo->idespecialidad=$row["desc_especialidad"];
              $oAbo->valorhora="$".$row["valor_hora"];
              $arrAbogados[$i]=$oAbo;
              $i++;
        }if (isset($arrAbogados)) {return $arrAbogados; }else {return null;}
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

