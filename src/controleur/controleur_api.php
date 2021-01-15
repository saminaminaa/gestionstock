<?php

    //fontion API pour la modification d'un commentaire
    function actionApiModifCom($twig,$db){
        if(isset($_POST['btModifCom'])){
            $sousproduit = new Sousproduit($db);
            $commentaire = $_POST['commentaire'];
            $id = $_POST['id'];
            
            $exec=$sousproduit->updateCom($id, $commentaire);
            
        }
        return json_encode(array('msg'=>'blblbl'));
    }

    // fonction API pour augmenter la quantité
    function actionApiAugmenterQte($twig,$db){
        if(isset($_POST['btAugmenterQte'])){
            $sousproduit = new Sousproduit($db);
            $qte = $_POST['qte'];
            $id = $_POST['id'];
    
            $exec=$sousproduit->updateQte($id, $qte);

            
        }
        return json_encode(array('msg'=>'blblbl'));
    }

    //fonction API pour baisser la quantité
    function actionApiBaisserQte($twig,$db){
        if(isset($_POST['btBaisserQte'])){
            $sousproduit = new Sousproduit($db);
            $qte = $_POST['qte'];
            $id = $_POST['id'];
            
            $exec=$sousproduit->updateQte2($id, $qte);
            
        }
        return json_encode(array('msg'=>'blblbl'));
    }