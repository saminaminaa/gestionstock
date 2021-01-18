<?php

class Typeproduit{
    
    private $db;
    
    private $insert;
    
    private $select;

    private $selectQte;
    
    public function __construct($db){
        
        $this->db = $db ;
        //requete pour inserer un type de produit dans la base de données
        $this->insert = $db->prepare("insert into typeproduit(libelle) values (:libelle)");
        
        //requete pour selectionner un type de produit
        $this->select = $db->prepare("select t.id, t.libelle from typeproduit t order by t.libelle");

        //requete pour selectionner un produit tout en calculant la quantité totale des produits correspondants à ce type
        $this->selectQte = $db->prepare("select t.id, t.libelle, SUM(s.qte) AS TotalQte from typeproduit t, sousproduit s WHERE t.id=s.idTypeproduit GROUP BY t.libelle");
        
    }
    
    //inserer
    public function insert($libelle){
        $r = true;
        $this->insert->execute(array(':libelle'=>$libelle));
        if ($this->insert->errorCode()!=0){
            print_r($this->insert->errorInfo());
            $r=false;
        }
        return $r;
    }
    
    //selectionner
    public function select(){
        $this->select->execute();
        if ($this->select->errorCode()!=0){
           print_r($this->select->errorInfo());
        }
        return $this->select->fetchAll();     
    }

    //selectionner avec qte totale produit
    public function selectQte(){
        $this->selectQte->execute();
        if ($this->selectQte->errorCode()!=0){
           print_r($this->selectQte->errorInfo());
        }
        return $this->selectQte->fetchAll();      
    }

}

