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

            /* $i = 0;
            for(s in liste){​​​​​​​
                echo <td id="quantity_$i" b.quantity> </td>;
                    $i++;
            }​​​​​​​;

            for($i = 0, $size = count($people); $i < $size; ++$i) {
                $people[$i]['salt'] = mt_rand(000000, 999999); */

            
        }
        return json_encode(array('msg'=>'blblbl'));
    }

    /* function actionApiActualiserQte($twig,$db){
        if(isset($_POST['btAugmenterQte'])){
            $sousproduit = new Sousproduit($db);
            $qte = $_POST['qte'];
            $id = $_POST['id'];
    
            $exec=$sousproduit->updateQte($id, $qte);
            
        }
        return json_encode(array('msg'=>'blblbl'));
    } */

    function actionApiBaisserQte($twig,$db){
        if(isset($_POST['btBaisserQte'])){
            $sousproduit = new Sousproduit($db);
            $qte = $_POST['qte'];
            $id = $_POST['id'];
            
            $exec=$sousproduit->updateQte2($id, $qte);
            
        }
        return json_encode(array('msg'=>'blblbl'));
    }
