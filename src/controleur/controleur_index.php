<?php
//------------------------------------------ACCUEIL-------------------------------------------------------------------------------------------
    //fonction pour la page d'accueil
    function actionAccueil($twig,$db){
        $form = array(); 
        $sousproduit = new Sousproduit($db); //Appel de la class/table sousproduit

        //supprimer un produit
        if(isset($_GET['id'])){      
            $exec=$sousproduit->delete($_GET['id']);
            //si ça ne s'execute pas...      
            if (!$exec){         
                $form['valide'] = false;           
                $form['message'] = 'Problème de suppression dans la table sousproduit'; //message d'erreur      
            } 
            //si s'execute avec succès...     
            else{         
                $form['valide'] = true;           
                $form['message'] = 'Produit supprimé avec succès';      
            }      
        } 


        $form = array();
        $typeproduit = new Typeproduit($db);
        $sousproduit = new Sousproduit($db);
        $liste = $typeproduit->selectQte(); //Creation d'une liste permettant de selectionner un type de produit avec la quantité totale des produits correspondant à ce type
        $liste2 = $sousproduit->select(); //Creation d'une liste permettant de selectionner tous les produits

        if(isset($_GET['id'])){
            //on cherche 1produit dont on connait l'id:
            $unSousproduit = $sousproduit->selectById($_GET['id']);
            if ($unSousproduit!=null){
                $form['sousproduit'] = $unSousproduit;
            }

            else{
                //si le produit n'existe pas
                $form['message'] = 'Produit incorrect';
            }
        }
        else{

       //Augmenter la quantité :
        if(isset($_POST['btAugmenterQte'])){
            $sousproduit = new Sousproduit($db);
            $qte = $_POST['qte'];
            $id = $_POST['id'];
            
            $exec=$sousproduit->updateQte($id, $qte);
            if(!$exec){
                $form['valide'] = false;
                $form['message'] = 'Échec de l augmentation de la quantité du produit';
            }
            else{
                $form['id'] = $id;
                $qte="1";
                $form['valide'] = true;
                $form['message'] = 'Modification réussie';
                //header('Location: index.php');
            }
        }
        else{
            $form['message'] = 'produit non précisé';
       }

        //Baisser la quantité :
        if(isset($_POST['btBaisserQte'])){
            $sousproduit = new Sousproduit($db);
            $qte = $_POST['qte'];
            $id = $_POST['id'];
            
            $exec=$sousproduit->updateQte2($id, $qte);
            if(!$exec){
                $form['valide'] = false;
                $form['message'] = 'Échec de la baisse de la quantité du produit';
            }
            else{
                $form['id'] = $id;
                $qte="1";
                $form['valide'] = true;
                $form['message'] = 'Modification réussie';
            }
        }
        else{
            $form['message'] = 'produit non précisé';
        }

        //Modifier un commentaire
        if(isset($_POST['btModifCom'])){
            $sousproduit = new Sousproduit($db);
            $commentaire = $_POST['commentaire'];
            $id = $_POST['id'];
            
            $exec=$sousproduit->updateCom($id, $commentaire);
            if(!$exec){
                $form['valide'] = false;
                $form['message'] = 'Échec de la modification du commentaire';
            }
            else{
                $form['id'] = $id;
                $form['commentaire'] = $commentaire;
                $form['valide'] = true;
                $form['message'] = 'Modification réussie';
                header('Location: index.php');
            }
        }
        else{
            $form['message'] = 'produit non précisé';
        }

    }
        echo $twig->render('index.html.twig', array('form'=>$form,'liste'=>$liste, 'liste2'=>$liste2));
    }

//----------------------------------AJOUT TYPE DE PRODUIT (table = typeproduit / page = ajout-type.html.twig)-------------------------------------------------------------------------------------------
    
    //fonction pour la page ajout-type
    function actionAjoutType($twig,$db){
        $form = array();
        //ajouter une type
        if (isset($_POST['btAjouter'])){
            $libelle = $_POST['libelle'];
            $form['valide'] = true;
            $typeproduit = new Typeproduit($db);
            $exec = $typeproduit->insert($libelle);
            if (!$exec){
                $form['valide'] = false;
                $form['message'] = 'Problème d\'insertion dans la table typeproduit ';
            }
            
            $form['libelle'] = $libelle;
        }
        echo $twig->render('ajout-type.html.twig', array('form'=>$form));
    
    }

//-------------------------------------AJOUT PRODUIT (table = sousproduit/ page = ajout-sousproduit.html.twig)-------------------------------------------------------------------------------------------
    //fonction pour la page ajout-sousproduit
    function actionAjoutSousproduit($twig,$db){
        $form = array();
        $typeproduit = new Typeproduit($db);
        $liste = $typeproduit->select(); //Liste des types de produits
        $form['typeproduits']=$liste;

        //Ajouter une produit
        if (isset($_POST['btAjouter'])){
            $libelle = $_POST['libelle'];
            $qte = $_POST['qte'];
            $fabricant = $_POST['fabricant'];
            $seuil = $_POST['seuil'];
            $reference = $_POST['reference'];
            $commentaire = $_POST['commentaire'];
            $idTypeproduit = $_POST['idTypeproduit'];
            $form['valide'] = true;
           
            $sousproduit = new Sousproduit($db);
                //insertion dans la table sousproduit
            $exec = $sousproduit->insert($libelle, $qte, $fabricant, $seuil, $reference, $commentaire, $idTypeproduit);
            if (!$exec){
                $form['valide'] = false;
                $form['message'] = 'Problème d\'insertion dans la table sousproduit ';
            }

            $form['libelle'] = $libelle;
            $form['qte'] = $qte;
            $form['fabricant'] = $fabricant;
            $form['seuil'] = $seuil;
            $form['reference'] = $reference;
            $form['commentaire'] = $commentaire;
            $form['idTypeproduit']=$idTypeproduit;
        }

        echo $twig->render('ajout-sousproduit.html.twig', array('form'=>$form,'liste'=>$liste));
    }

    function actionMaintenance($twig){
        echo $twig->render('maintenance.html.twig', array());
    }

   function actionRecherche($twig,$db){
    if(isset($_POST['btRechercher'])){
        /* if (isset($_POST)){ */
        $recherche = $_POST['recherche'];
        /* if(isset($_GET['libelle'])){ */
            $form = array();
            $sousproduit = new Sousproduit($db);
            //$exec=$sousproduit->recherche($recherche);

            $form['recherche'] = $recherche;

            $listeRecherche = $sousproduit->recherche($recherche); //Liste des types de produits
            
        }
    /* } */
        echo $twig->render('recherche.html.twig', array('form'=>$form, 'listeRecherche'=>$listeRecherche));

    }

?>