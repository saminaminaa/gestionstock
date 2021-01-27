<?php
  session_start();
  require_once '../src/app/connexion.php';

    function actionRecherche($twig,$db){
    
      if(isset($_POST['btRechercher'])){
          $form = array();
          $sousproduit = new Sousproduit($db);
          $uneRecherche = $_POST['recherche'];
          $recherche = $_POST['recherche'];
          $form['recherche'] = $recherche;
          $_SESSION['recherche'] = $recherche;
          $listeRecherche = $sousproduit->recherche($uneRecherche); //Liste des types de produits
 
      }else 
      if(isset($_SESSION['recherche'])){
        $form = array();
        $sousproduit = new Sousproduit($db);
        $uneRecherche = $_SESSION['recherche'];
        $recherche = $_SESSION['recherche'];
        $form['recherche'] = $recherche;
        $_SESSION['recherche'] = $recherche;
        $listeRecherche = $sousproduit->recherche($uneRecherche); //Liste des types de produits

      }
      echo $twig->render('recherche.html.twig', array('form'=>$form, 'listeRecherche'=>$listeRecherche));
  }


?>