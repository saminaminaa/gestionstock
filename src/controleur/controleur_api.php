<?php

//controleur créé pour l'API, pour pouvoir envoyer les données d'un formulaire à la BD sans que la page se rafraichisse à chaque clic
//Nous avons ici une fonction par formulaire.

    //fontion API pour la modification d'un commentaire
    function actionApiModifCom($twig,$db){
        //Lorsque le bouton "BtModifCom" est cliqué :
        if(isset($_POST['btModifCom'])){
            $sousproduit = new Sousproduit($db); //Table sousproduit
            $commentaire = $_POST['commentaire']; //on récupère la valeur ayant pour name "commentaire" du formulaire
            $id = $_POST['id']; // meme chose pour l'input de name "id".
            
            $exec=$sousproduit->updateCom($id, $commentaire); //ici on execute la requete "updateCom" qui permet de modifier une commentaire
            //On donne à cette reque l'id et le commentaire pour qu'elle puisse s'executer.
            
        }
        return json_encode(array('msg'=>'message')); //On retourne du json
    }

    // fonction API pour augmenter la quantité
    function actionApiAugmenterQte($twig,$db){
        if(isset($_POST['btAugmenterQte'])){ //Si le bouton est cliqué
            $sousproduit = new Sousproduit($db); //table BD
            $qte = $_POST['qte']; //On recupere les valeurs des inputs
            $id = $_POST['id'];
    
            $exec=$sousproduit->updateQte($id, $qte); //On execute la requete "UpdateQte" contenue dans la classe sousproduit.

            
        }
        return json_encode(array('msg'=>'message')); //On retourne du json
    }

    //fonction API pour baisser la quantité
    function actionApiBaisserQte($twig,$db){ //Meme chose que pour les fonctions précédentes.
        if(isset($_POST['btBaisserQte'])){
            $sousproduit = new Sousproduit($db);
            $qte = $_POST['qte'];
            $id = $_POST['id'];
            
            $exec=$sousproduit->updateQte2($id, $qte);
            
        }
        return json_encode(array('msg'=>'blblbl'));
    }