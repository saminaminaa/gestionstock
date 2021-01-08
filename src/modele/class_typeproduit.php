<?php

class Typeproduit{
    
    private $db;
    
    private $insert;
    
    private $select;
    
    public function __construct($db){
        
        $this->db = $db ;
        $this->insert = $db->prepare("insert into typeproduit(libelle, qte, commentaire) values (:libelle, :qte, :commentaire)");

        $this->select = $db->prepare("select id, libelle, qte, commentaire from typeproduit t order by libelle");
        
    }
    
    public function insert($libelle, $qte, $commentaire){
         $r = true;
        $this->insert->execute(array(':libelle'=>$libelle, ':qte'=>$qte, ':commentaire'=>$commentaire));
        if ($this->insert->errorCode()!=0){
            print_r($this->insert->errorInfo());
            $r=false;
        }
        return $r;
    }
         
 
         
          
    public function select(){
        $this->select->execute();
        if ($this->select->errorCode()!=0){
           print_r($this->select->errorInfo());
        }
        return $this->select->fetchAll();      
         
     }


}

