<?php

//----------------------------------Controleur pour la page "modif-sousproduit"------------------------------------------------

//Cette fonction permet aux utilisateurs de modifier des produits :
function actionModifSousproduit($twig, $db){
    $form = array();
    $typeproduit = new Typeproduit($db); //Classe Typeproduit
    $liste = $typeproduit->select(); //On selectionne ce qui est contenu dans la table Typeproduit grace à la requete select() 
    $form['typeproduits']=$liste; //liste des types de produits

    if(isset($_GET['id'])){ //On recupère l'id contenu dans le lien
        $sousproduit = new Sousproduit($db); //Classe sousproduit

        $unSousproduit = $sousproduit->selectById($_GET['id']); //On selectionne un produit grace à son id
        if ($unSousproduit!=null){ // Si le produit est renseigné
            $form['sousproduit'] = $unSousproduit;
        }
        else{ //Si le produit n'est pas renseigner
            $form['message'] = 'Produit incorrect'; //Msg d'erreur
        }
    }
    else{
        if(isset($_POST['btModifier'])){ //Si le bouton pour modifier est cliqué
            $sousproduit = new Sousproduit($db);
            $id = $_POST['id']; //Valeurs du form
            $libelle = $_POST['libelle'];
            $qte = $_POST['qte'];
            $fabricant = $_POST['fabricant'];
            $commentaire = $_POST['commentaire'];
            $seuil = $_POST['seuil'];
            $reference = $_POST['reference'];
            $idTypeproduit = $_POST['idTypeproduit'];
            //On execute la requete permettant de modifier toute une ligne de la table sousproduit
            $exec=$sousproduit->updateAll($id, $libelle, $qte, $fabricant, $commentaire, $seuil, $reference, $idTypeproduit);
            if(!$exec){//Si la requete ne s'execute pas
                $form['valide'] = false;
                $form['message'] = 'Échec de la modification';
            }
            else{//Sinon
                $form['valide'] = true;
                $form['message'] = 'Modification réussie';
            }
        }
        else{ //Produit non précisé
            $form['message'] = 'Produit non précisé';
        }
    }
    echo $twig->render('modif-sousproduit.html.twig', array('form'=>$form,'liste'=>$liste));
}


?>