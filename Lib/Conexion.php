<?php
class Conexion{
    var $objconn;
    
    var $dbusr="pablo";
    var $dbpwd="kuro";
    var $dbhost="localhost";
    var $dbname="dbdai";
    
    public function Conectar(){
         $this->objconn = new mysqli($this->dbhost,
                                    $this->dbusr,
                                    $this->dbpwd,
                                    $this->dbname);
         
       if ($this->objconn->connect_errno) {
        return "Fallo al conectar a MySQL: (" . $this->objconn->connect_errno . ") " . $this->objconn->connect_error;
     }
     return true;  
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

