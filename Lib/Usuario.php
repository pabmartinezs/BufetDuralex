<?php
    
class Usuario{
    var $id_usuario;
    var $rut_usuario;
    var $nombre_usuario;
    var $password;
    Var $id_perfil;
    
    public function __construct($lrut = "",$lpwd = "") {
        $this->nomusuario = $lrut;
        $this->clave = $lpwd;
    }
    
    public function ValidarAcceso(){
        $oConn = new Conexion();
        if($oConn->Conectar()){
            $db = $oConn->objconn;
        }else{
            return false;
        }
        $clavemd5=md5($this->clave);
        /*query*/
        $sqli = "SELECT * FROM usuario WHERE rut_usuario='$this->nomusuario' and password='$clavemd5'";
        
        $resultado=$db->query($sqli);
        
        if($resultado->num_rows>=1){
            $row = $resultado->fetch_row();
            $this->id_usuario=$row[0];
            $this->nombreUser=$row[3];
            $this->perfilUser=$row[4];
            return true;
        }
        else{
            return false;
        }      
    }
    
    public function ListarUsuarios(){
        $oConn=new Conexion();
        if($oConn->Conectar()){
            $db=$oConn->objconn;            
        }else{
            return false;
        }
        $sqli="SELECT * FROM usuario JOIN perfil on(usuario.id_perfil=perfil.id_perfil)";
        $resultado=$db->query($sqli);
        $i=0;
        while($row=$resultado->fetch_assoc()){
              $oUsu=new Usuario();
              $oUsu->idusuario=$row["id_usuario"];
              $oUsu->rutusuario=$row["rut_usuario"];
              $oUsu->pass=$row["password"];
              $oUsu->nombreusuario=$row["nombre_usuario"];
              $oUsu->idperfilusuario=$row["desc_perfil"];
              $arrUsuarios[$i]=$oUsu;
              $i++;
        }
        if (isset($arrUsuarios)) {return $arrUsuarios; }else {return null;}
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

