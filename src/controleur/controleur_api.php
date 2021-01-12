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

