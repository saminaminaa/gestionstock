<?php

class Sousproduit{
    
    private $db;
    
    private $insert;
    
    private $select;
    
    public function __construct($db){
        
        $this->db = $db ;
        $this->insert = $db->prepare("insert into sousproduit(libelle, qte, fabricant, stock, commentaire, idTypeproduit) values (:libelle, :qte, :fabricant, :stock, :commentaire, :idTypeproduit)");

        $this->select = $db->prepare("select id, libelle, qte, fabricant, stock, commentaire, idTypeproduit from sousproduit s, typeproduit t where s.idTypeproduit = t.id order by libelle");
        
    }
    
    public function insert($libelle, $qte, $fabricant, $stock, $commentaire, $typeproduit){
         $r = true;
        $this->insert->execute(array(':libelle'=>$libelle, ':qte'=>$qte, ':fabricant'=>$fabricant, ':stock'=>$stock, ':commentaire'=>$commentaire, ':idTypeproduit'=>$typeproduit));
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

