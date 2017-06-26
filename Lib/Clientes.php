<?php 
class Cliente{
    var $id_cliente;
    var $rut_cliente;
    var $password;
    Var $nombre_cliente;
    var $fecha_ingreso;
    var $id_tipo_persona;
    var $direccion;
    var $telefono;
    var $idperfil;

    public function __construct($lrut = "",$lpwd = "",$lidc = "",$lnom="",$lfech="",$lidtipo="",$ldir="",$lfono="",$lidreg="") {
        $this->idcliente=$lidc;
        $this->rutcliente=$lrut;
        $this->clave = $lpwd;
        $this->nombrecliente=$lnom;
        $this->fechaingreso=$lfech;
        $this->tipopersona=$lidtipo;
        $this->direccion=$ldir;
        $this->telefono=$lfono;
        $this->perfil=$lidreg;
    }
    public function BuscarCliente($lidreg=""){
        $oConn = new Conexion();
        if($oConn->Conectar()){$db = $oConn->objconn;}else{return false;}
        $sqli="SELECT * FROM cliente id_cliente='$lidreg'";
        $resultado=$db->query($sqli);
        if($resultado->num_rows>=1){
            $row = $resultado->fetch_row();
            $this->idcliente=$row[0];
            $this->rutcliente=$row[1];
            $this->nombrecliente=$row[3];
            $this->fechaingreso=$row[4];
            $this->tipopersona=$row[5];
            $this->direccion=$row[6];
            $this->telefono=$row[7];
            $this->perfil=$row[8];
            return true;
        }
        else{
            return false;
        } 
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
        $sqli = "SELECT * FROM cliente WHERE rut_cliente='$this->rutcliente' and password='$clavemd5'";
        
        $resultado=$db->query($sqli);
        
        if($resultado->num_rows>=1){
            $row = $resultado->fetch_row();
            $this->id_cliente=$row[0];
            $this->nombreUser=$row[3];
            $this->perfilUser=$row[8];
            return true;
        }
        else{
            return false;
        }      
    }
    
    public function ListarClientes(){
        $oConn=new Conexion();
        if($oConn->Conectar()){
            $db=$oConn->objconn;            
        }else{return false;}
        $sqli="SELECT * FROM Cliente JOIN Perfil ON(Cliente.id_perfil=Perfil.id_perfil) JOIN Tipo_persona ON(Cliente.id_tipo_persona=Tipo_persona.id_tipo_persona)";
        $resultado=$db->query($sqli);
        $i=0;
        while($row=$resultado->fetch_assoc()){
              $oCli=new Cliente();           
              $oCli->idcliente=$row["id_cliente"];
              $oCli->rutcliente=$row["rut_cliente"];
              $oCli->nombrecliente=$row["nombre_cliente"];
              $oCli->fechaingreso=$row["fecha_ingreso"];
              $oCli->tipopersona=$row["desc_tipo_persona"];
              $oCli->direccion=$row["direccion"];
              $oCli->telefono=$row["telefono"];
              $oCli->perfil=$row["desc_perfil"];
              $arrClientes[$i]=$oCli;
              $i++;
        }if (isset($arrClientes)) {return $arrClientes; }else {return null;}
    }
    
    /*
    public function AddCliente($lcliente="") {
        $oConn = new Conexion();
        if($oConn->Conectar()){
            $db = $oConn->objconn;
        }else{
            return false;
        }
        $query = mysqli_query($db, "INSERT INTO cliente (id_cliente,rut_cliente,password,nombre_clietne,fecha_ingreso,id_tipo_persona,direccion_telefono,id_perfil)
                                        VALUES ('$rutayu','$nomayu','$dirayu')");
        
    }*/
}


