<?php

class autor extends connexio{
    
    //atributs
    var $aut_idautor;
    var $aut_autor;
    
    //constructor
    function autor($ruta="../../"){
        parent::connexio($ruta);
    }
    function inicialitza($id){
        $this->aut_idautor = $id;
        if ( $this->aut_autor == 0){
            $this->aut_autor=="";
        }else{
            $sql="SELECT AUTORS.AUT_IDAUTOR,AUTORS.AUT_AUTOR FROM AUTORS WHERE (AUTORS.AUT_IDAUTOR=".$id.")";
            $rs= $this->DB_Select($sql);
            $rs= $this->DB_Fetch($rs);
            $this->aut_autor=$rs['AUT_AUTOR'];
            
        }
    }
    function carregaValors($id,$autor){
        $this-> set_aut_idautor($id);
        $this-> set_aut_autor($autor);
    }
    function get_aut_idautor(){
        return $this->aut_idautor;
    }
    function get_aut_autor(){
        return $this->aut_autor;
    }
    function set_aut_idautor($valor){
        $this->aut_idautor=$valor;
    }
    function set_aut_autor($valor){
        $this->aut_autor=$valor;
    }
    function esborra(){
        $sql="DELETE FROM AUTORS WHERE AUT_IDAUTOR=".$this->aut_idautor;
        $this->DB_Execute($sql);
    }
    function modificar(){
        $sql="UPDATE FROM AUTORS SET AUT_AUTOR='".$this->aut_autor."'WHERE AUT_IDAUTOR=".$this->aut_idautor;
        $this->DB_Execute($sql);
        return$this->aut_idautor;
    }
    function afegeix(){
        $sql="INSERT INTO AUTORS (AUT_AUTOR) VALUES ('".$this->aut_autor."')";
        $this->DB_Execute($sql);
        
        $sql_id="SELECT max(AUT_IDAUTOR) AS AUT_IDAUTOR FROM AUTORS";
        $rs_id= $this->DB_Select($sql_id);
        $rs_id= $this->DB_Fetch($rs_id);
        $this->aut_idautor=$rs_id['AUT_IDAUTOR'];
        return $this->aut_idautor;


    }
    
    }

?>

