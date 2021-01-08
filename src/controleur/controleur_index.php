<?php
/*     function actionAccueil($twig){



        echo $twig->render('index.html.twig', array());
    } */

//------------------------------------------ACCUEIL-------------------------------------------------------------------------------------------

    function actionAccueil($twig,$db){
        $form = array();
        $typeproduit = new Typeproduit($db);
    
        $liste = $typeproduit->select();
    
        echo $twig->render('index.html.twig', array('form'=>$form,'liste'=>$liste));
    }




//----------------------------------AJOUT TYPE DE PRODUIT (table = typeproduit / page = ajout-type.html.twig)-------------------------------------------------------------------------------------------

    function actionAjoutType($twig,$db){
        $form = array();
        if (isset($_POST['btAjouter'])){
            $libelle = $_POST['libelle'];
            $qte = $_POST['qte'];
            $stock = $_POST['stock'];
            $commentaire = $_POST['commentaire'];
            $form['valide'] = true;
           
            $typeproduit = new Typeproduit($db);
                $exec = $typeproduit->insert($libelle, $qte, $stock, $commentaire);
                if (!$exec){
                    $form['valide'] = false;
                    $form['message'] = 'Problème d\'insertion dans la table typeproduit ';
                }
            
            $form['libelle'] = $libelle;
            $form['qte'] = $qte;
            $form['stock'] = $stock;
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
            $stock = $_POST['stock'];
            $commentaire = $_POST['commentaire'];
            $typeproduit = $_POST['idTypeproduit'];
            $form['valide'] = true;
           
            $sousproduit = new Sousproduit($db);
                $exec = $sousproduit->insert($libelle, $qte, $fabricant, $stock, $commentaire, $typeproduit);
                if (!$exec){
                    $form['valide'] = false;
                    $form['message'] = 'Problème d\'insertion dans la table sousproduit ';
                }

            
            $form['libelle'] = $libelle;
            $form['qte'] = $qte;
            $form['fabricant'] = $fabricant;
            $form['stock'] = $stock;
            $form['commentaire'] = $commentaire;
            $form['idTypeproduit']=$typeproduit;
        }
        echo $twig->render('ajout-sousproduit.html.twig', array('form'=>$form,'liste'=>$liste));
    
    }

    function actionMaintenance($twig){
        echo $twig->render('maintenance.html.twig', array());
    }

?>
