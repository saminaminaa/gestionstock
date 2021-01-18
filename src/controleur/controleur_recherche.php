<?php
  session_start();
  require_once '../src/app/connexion.php';
  /* require_once('../src/app/connexion.php'); */
 
 /*  if(isset($_GET['produit'])){
    $produit = (String) trim($_GET['produit']);

    $req = $db->query("SELECT *
      FROM sousproduit
      WHERE libelle LIKE ?
      LIMIT 10",
      array("$produit%"));
 
    $req = $req->fetchALL();

    foreach($req as $r){
      ?>   
        <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc"><?= $r['libelle'] . " " . $r['qte'] ?></div><?php    
    }
  } */

    function actionApiRechercheProduit($twig,$db){
        /* if(isset($_POST['btRechercheProduit'])){
            $sousproduit = new Sousproduit($db);
            $rechercheproduit = $_POST['rechercheproduit'];
            
            $exec=$sousproduit->select($rechercheproduit);
            
        }
        return json_encode(array('msg'=>'blblbl')); */

        if(isset($_GET['libelle'])){
            $form = array();
            $sousproduit = new Sousproduit($db);
            /* $libelle = $_POST['libelle']; */
                
            /* $exec=$sousproduit->selectSearch($libelle);
            $listesearch = $sousproduit->selectSearch($libelle); */
            $unSousproduit = $sousproduit->selectSearch($_GET['libelle']);
            if ($unSousproduit!=null){
                $form['sousproduit'] = $unSousproduit;
            }

            else{
                //si le produit n'existe pas
                $form['message'] = 'Produit incorrect';
            }

/* 
            $produit = (String) trim($_GET['produit']);
        
            $req = $db->query("SELECT *
              FROM sousproduit
              WHERE libelle LIKE ?
              LIMIT 10",
              array("$produit%"));
         
            $req = $req->fetchAll();
        
            foreach($req as $r){
              ?>   
                <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc"><?= $r['libelle'] . " " . $r['qte'] ?></div><?php    
            } */
        }
        return json_encode(array('msg'=>'blblbl'));
        

    }


?>