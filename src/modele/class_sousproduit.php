<?php

class Sousproduit{
    
    private $db;
    
    private $insert;
    
    private $select;

    private $updateQte;

    private $updateQte2;

    private $updateCom;

    private $selectById;

    private $updateAll;

    private $delete;

    private $selectSearch;

    private $recherche;
    
    public function __construct($db){
        
        $this->db = $db ;
        //requete pour inserer un produit dans la BD
        $this->insert = $db->prepare("insert into sousproduit(libelle, qte, fabricant, seuil, reference, commentaire, idTypeproduit) values (:libelle, :qte, :fabricant, :seuil, :reference, :commentaire, :idTypeproduit)");

        //requete pour tout selectionner
        $this->select = $db->prepare("select id, libelle, qte, fabricant, seuil, reference, commentaire, idTypeproduit from sousproduit s order by libelle");
       
        //requete pour augmenter la quantité du produit
        $this->updateQte = $db->prepare("update sousproduit set qte=qte +:qte where id=:id");

        //requete pour baisser la quantité du produit
        $this->updateQte2 = $db->prepare("update sousproduit set qte=qte -:qte where id=:id");

        //requete pour modifier un commentaire
        $this->updateCom = $db->prepare("update sousproduit set commentaire=:commentaire where id=:id");

        //requete pour selectionner un produit par son id
        $this->selectById = $db->prepare("select id, libelle, qte, fabricant, seuil, reference, commentaire, idTypeproduit from sousproduit s where id=:id");
        
        //requete pour modifier toute une ligne (modifier un produit)
        $this->updateAll = $db->prepare("update sousproduit set id=:id, libelle=:libelle, qte=:qte, fabricant=:fabricant, seuil=:seuil, reference=:reference, commentaire=:commentaire, idTypeproduit=:idTypeproduit where id=:id");

        //requete pour supprimer un produit
        $this->delete = $db->prepare("delete from sousproduit s where id=:id"); 

        //requete pour selectionner une recherche
        $this->selectSearch = $db->prepare("select id, libelle, qte, fabricant, seuil, reference, commentaire, idTypeproduit from sousproduit s where libelle=:libelle order by libelle");
       
        //requete pour effectuer une recherche sur le site
        $this->recherche = $db->prepare("select s.id, s.libelle, s.qte, s.fabricant, s.seuil, s.reference, s.commentaire, s.idTypeproduit, t.libelle as type from sousproduit s, typeproduit t where s.idTypeproduit = t.id and s.reference like :recherche order by s.libelle");

    }
    
    //inserer
    public function insert($libelle, $qte, $fabricant, $seuil, $reference, $commentaire, $idTypeproduit){
        $r = true;
        $this->insert->execute(array(':libelle'=>$libelle, ':qte'=>$qte, ':fabricant'=>$fabricant, ':seuil'=>$seuil, ':reference'=>$reference, ':commentaire'=>$commentaire, ':idTypeproduit'=>$idTypeproduit));
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

    //augmenter qte
    public function updateQte($id, $qte){
        $r = true;
        $this->updateQte->execute(array(':id'=>$id, ':qte'=>$qte));
        if ($this->updateQte->errorCode()!=0){
            print_r($this->updateQte->errorInfo());
            $r=false;
        }
        return $r;
    }

    //baisser qte
    public function updateQte2($id, $qte){
        $r = true;
        $this->updateQte2->execute(array(':id'=>$id, ':qte'=>$qte));
        if ($this->updateQte2->errorCode()!=0){
            print_r($this->updateQte2->errorInfo());
            $r=false;
        }
        return $r;
    }

    //modifier commentaire
    public function updateCom($id, $commentaire){
        $r = true;
        $this->updateCom->execute(array(':id'=>$id, ':commentaire'=>$commentaire));
        if ($this->updateCom->errorCode()!=0){
            print_r($this->updateCom->errorInfo());
            $r=false;
        }
        return $r;
    }

    //selectionner par l'id
    public function selectById($id){
        $this->selectById->execute(array(':id'=>$id));
        if ($this->selectById->errorCode()!=0){
            print_r($this->selectById->errorInfo());
        }
        return $this->selectById->fetch();
    }   
    
    //Modifier la ligne entiere
    public function updateAll($id, $libelle, $qte, $fabricant, $commentaire, $seuil, $reference, $idTypeproduit){
        $r = true;
        $this->updateAll->execute(array(':id'=>$id, ':libelle'=>$libelle, ':qte'=>$qte, ':fabricant'=>$fabricant, ':commentaire'=>$commentaire, ':seuil'=>$seuil, ':reference'=>$reference, ':idTypeproduit'=>$idTypeproduit));
        if ($this->updateAll->errorCode()!=0){
            print_r($this->updateAll->errorInfo());
            $r=false;
        }
        return $r;
    }

    //supprimer la ligne entiere
    public function delete($id){        
        $r = true;        
        $this->delete->execute(array(':id'=>$id));        
        if ($this->delete->errorCode()!=0){             
            print_r($this->delete->errorInfo());               
            $r=false;        
        }        
        return $r;    
    }
    //Selectionner via une recherche
    public function selectSearch($libelle){
        $this->selectSearch->execute(array(':libelle'=>$libelle));
        if ($this->selectSearch->errorCode()!=0){
           print_r($this->select->errorInfo());
        }
        return $this->selectSearch->fetchAll();      
    }

    //Effectuer une recherche
    public function recherche($recherche){
        $this->recherche->execute(array('recherche'=>'%'.$recherche.'%'));
        if ($this->recherche->errorCode()!=0){
            print_r($this->recherche->errorInfo());
        }
        return $this->recherche->fetchAll();
    }
}
