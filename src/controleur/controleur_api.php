<?php

    function actionApiModifCom($twig,$db){
        if(isset($_POST['btModifCom'])){
            $sousproduit = new Sousproduit($db);
            $commentaire = $_POST['commentaire'];
            $id = $_POST['id'];
            
            $exec=$sousproduit->updateCom($id, $commentaire);
            
        }
        return json_encode(array('msg'=>'blblbl'));
    }

    function actionApiAugmenterQte($twig,$db){
        if(isset($_POST['btAugmenterQte'])){
            $sousproduit = new Sousproduit($db);
            $qte = $_POST['qte'];
            $id = $_POST['id'];
            
            $exec=$sousproduit->updateQte($id, $qte);
            
        }
        return json_encode(array('msg'=>'blblbl'));
    }
