<?php
    
class Perfil{
    var $id_perfil;
    var $desc_perfil;
    
    
    public function NombrePerfil(){
        $oConn = new Conexion();
        if($oConn->Conectar()){
            $db = $oConn->objconn;
        }else{
            return false;
        }
        $sqli = "SELECT * FROM perfil WHERE id_perfil='$this->idper'";
        
        $resultado=$db->query($sqli);
        
        if($resultado->num_rows>=1){
            $row = $resultado->fetch_row();
            $this->perfilnombre=$row[1];
            return true;
        }
        else{
            return false;
        }      
    }
    
    public function ListarPerfil(){
        $oConn=new Conexion();
        if($oConn->Conectar()){
            $db=$oConn->objconn;            
        }else{
            return false;
        }
        $sqli="SELECT * FROM perfil";
        $resultado=$db->query($sqli);
        $i=0;
        while($row=$resultado->fetch_assoc()){
              $oPEr=new Perfil();
              $oPEr->idperfil=$row["id_perfil"];
              $oPEr->descperfil=$row["desc_perfil"];
              $arrPerfiles[$i]=$oPEr;
              $i++;
        }
        if (isset($arrPerfiles)) {return $arrPerfiles; }else {return null;}
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

