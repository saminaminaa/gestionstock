<?php
//------------------------------------------ACCUEIL-------------------------------------------------------------------------------------------

    function actionAccueil($twig,$db){
        $form = array();
        $typeproduit = new Typeproduit($db);
        $sousproduit = new Sousproduit($db);
        $liste = $typeproduit->selectQte();
        $liste2 = $sousproduit->select();
        $listeTri = $sousproduit->selectTri();

        if(isset($_GET['id'])){
        //on cherche 1produit dont on connait l'id:
        $unSousproduit = $sousproduit->selectById($_GET['id']);
        if ($unSousproduit!=null){
            $form['sousproduit'] = $unSousproduit;
        }

        else{
    //si l'utilisateur n'existe pas
    $form['message'] = 'Utilisateur incorrect';
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
                header('Location: index.php');
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
                header('Location: index.php');
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
        echo $twig->render('index.html.twig', array('form'=>$form,'liste'=>$liste, 'liste2'=>$liste2, 'listeTri'=>$listeTri));
    }

//----------------------------------AJOUT TYPE DE PRODUIT (table = typeproduit / page = ajout-type.html.twig)-------------------------------------------------------------------------------------------

    function actionAjoutType($twig,$db){
        $form = array();
        if (isset($_POST['btAjouter'])){
            $libelle = $_POST['libelle'];
            $commentaire = $_POST['commentaire'];
            $form['valide'] = true;
           
            $typeproduit = new Typeproduit($db);
                $exec = $typeproduit->insert($libelle, $commentaire);
                if (!$exec){
                    $form['valide'] = false;
                    $form['message'] = 'Problème d\'insertion dans la table typeproduit ';
                }
            
            $form['libelle'] = $libelle;
            $form['commentaire'] = $commentaire;
        }
        echo $twig->render('ajout-type.html.twig', array('form'=>$form));
    
    }

//-------------------------------------AJOUT PRODUIT (table = sousproduit/ page = ajout-sousproduit.html.twig)-------------------------------------------------------------------------------------------

    function actionAjoutSousproduit($twig,$db){
        $form = array();
        /* $typeproduit = new Typeproduit($db);
            $liste = $typeproduit->select();
            $form['typeproduit']=$liste; */
            $typeproduit = new Typeproduit($db);
            $liste = $typeproduit->select();
            $form['typeproduits']=$liste;

            /* $typeproduit = new Typeproduit($db);
            $liste = $typeproduit->select(); */
        if (isset($_POST['btAjouter'])){
            $libelle = $_POST['libelle'];
            $qte = $_POST['qte'];
            $fabricant = $_POST['fabricant'];
            $seuil = $_POST['seuil'];
            $commentaire = $_POST['commentaire'];
            $idTypeproduit = $_POST['idTypeproduit'];
            $form['valide'] = true;
           
            $sousproduit = new Sousproduit($db);
                $exec = $sousproduit->insert($libelle, $qte, $fabricant, $seuil, $commentaire, $idTypeproduit);
                if (!$exec){
                    $form['valide'] = false;
                    $form['message'] = 'Problème d\'insertion dans la table sousproduit ';
                }

            
            $form['libelle'] = $libelle;
            $form['qte'] = $qte;
            $form['fabricant'] = $fabricant;
            $form['seuil'] = $seuil;
            $form['commentaire'] = $commentaire;
            $form['idTypeproduit']=$idTypeproduit;
        }
        echo $twig->render('ajout-sousproduit.html.twig', array('form'=>$form,'liste'=>$liste));
    
    }

    function actionMaintenance($twig){
        echo $twig->render('maintenance.html.twig', array());
    }

?>
