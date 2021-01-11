<?php

class Sousproduit{
    
    private $db;
    
    private $insert;
    
    private $select;

    private $updateQte;

    private $updateQte2;

    private $updateCom;

    private $selectById;

    private $selectTri;

    private $selectAll;
    
    public function __construct($db){
        
        $this->db = $db ;
        $this->insert = $db->prepare("insert into sousproduit(libelle, qte, fabricant, seuil, commentaire, idTypeproduit) values (:libelle, :qte, :fabricant, :seuil, :commentaire, :idTypeproduit)");

        $this->select = $db->prepare("select id, libelle, qte, fabricant, seuil, commentaire, idTypeproduit from sousproduit s order by libelle");
        /* $this->select = $db->prepare("select id, libelle, qte, fabricant, stock, commentaire, idTypeproduit from sousproduit s, typeproduit t where s.idTypeproduit = t.id order by libelle"); */
        $this->updateQte = $db->prepare("update sousproduit set qte=qte +:qte where id=:id");

        $this->updateQte2 = $db->prepare("update sousproduit set qte=qte -:qte where id=:id");

        $this->updateCom = $db->prepare("update sousproduit set commentaire=:commentaire where id=:id");

        $this->selectById = $db->prepare("select id, libelle, qte, fabricant, seuil, commentaire, t.libelle as libelletypeproduit from typeproduit t, sousproduit s where id=:id and t.id=s.idTypeproduit");
        
        $this->selectTri = $db->prepare("SELECT s.libelle AS libelleProduit, t.libelle AS libelleType, s.qte, s.fabricant, s.commentaire from sousproduit s, typeproduit t WHERE s.idTypeproduit=t.id and t.libelle='PC'");

        $this->selectAll = $db->prepare("SELECT t.libelle AS libelleType, s.libelle AS libelleProduit, t.commentaire, s.qte, s.fabricant, s.commentaire from sousproduit s, typeproduit t WHERE s.idTypeproduit=t.id GROUP BY s.idTypeproduit");

    }
    
    public function insert($libelle, $qte, $fabricant, $seuil, $commentaire, $idTypeproduit){
         $r = true;
        $this->insert->execute(array(':libelle'=>$libelle, ':qte'=>$qte, ':fabricant'=>$fabricant, ':seuil'=>$seuil, ':commentaire'=>$commentaire, ':idTypeproduit'=>$idTypeproduit));
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

    public function updateQte($id, $qte){
        $r = true;
        $this->updateQte->execute(array(':id'=>$id, ':qte'=>$qte));
        if ($this->updateQte->errorCode()!=0){
            print_r($this->updateQte->errorInfo());
            $r=false;
        }
        return $r;
    }

    public function updateQte2($id, $qte){
        $r = true;
        $this->updateQte2->execute(array(':id'=>$id, ':qte'=>$qte));
        if ($this->updateQte2->errorCode()!=0){
            print_r($this->updateQte2->errorInfo());
            $r=false;
        }
        return $r;
    }

    public function updateCom($id, $commentaire){
        $r = true;
        $this->updateCom->execute(array(':id'=>$id, ':commentaire'=>$commentaire));
        if ($this->updateCom->errorCode()!=0){
            print_r($this->updateCom->errorInfo());
            $r=false;
        }
        return $r;
    }

    public function selectById($id){
        $this->selectById->execute(array(':id'=>$id));
        if ($this->selectById->errorCode()!=0){
            print_r($this->selectById->errorInfo());
        }
        return $this->selectById->fetch();
    }   
    
    public function selectTri(){
        $this->selectTri->execute();
        if ($this->selectTri->errorCode()!=0){
           print_r($this->selectTri->errorInfo());
        }
        return $this->selectTri->fetchAll();      
         
     }

     public function selectAll(){
        $this->selectAll->execute();
        if ($this->selectAll->errorCode()!=0){
           print_r($this->selectAll->errorInfo());
        }
        return $this->selectAll->fetchAll();      
         
     }



}

