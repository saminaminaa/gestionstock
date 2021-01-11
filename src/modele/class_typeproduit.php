<?php

class Typeproduit{
    
    private $db;
    
    private $insert;
    
    private $select;

    private $selectQte;
    
    public function __construct($db){
        
        $this->db = $db ;
        $this->insert = $db->prepare("insert into typeproduit(libelle, commentaire) values (:libelle, :commentaire)");
        
        $this->select = $db->prepare("select id, libelle, commentaire from typeproduit t order by t.libelle");

        $this->selectQte = $db->prepare("select t.id, t.libelle, t.commentaire, SUM(s.qte) AS TotalQte from typeproduit t, sousproduit s WHERE t.id=s.idTypeproduit GROUP BY t.libelle");
        
    }
    
    public function insert($libelle, $commentaire){
         $r = true;
        $this->insert->execute(array(':libelle'=>$libelle, ':commentaire'=>$commentaire));
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

     public function selectQte(){
        $this->selectQte->execute();
        if ($this->selectQte->errorCode()!=0){
           print_r($this->selectQte->errorInfo());
        }
        return $this->selectQte->fetchAll();      
         
     }


}

