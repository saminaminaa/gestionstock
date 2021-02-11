<?php

//--------------------------------------Controleur pour la page de recherche---------------------------------------------------
  session_start(); //On commence une session (pour pouvoir retenir la recherche de l'utilisateur)

  //Fonction permettant d'executer une recherche
  function actionRecherche($twig,$db){
    if(isset($_POST['btRechercher'])){ //Si click sur rechercher
      $form = array();
      $sousproduit = new Sousproduit($db);
      $uneRecherche = $_POST['recherche']; //On recupere la recherche
      $recherche = $_POST['recherche'];
      $form['recherche'] = $recherche;
      $_SESSION['recherche'] = $recherche; //On stock la valeur recherché en session
      $listeRecherche = $sousproduit->recherche($uneRecherche); //Liste des produits correspondants à la recherche
 
    }else 
    if(isset($_SESSION['recherche'])){ //Si la valeur recherché est stocké dans la session
      //Meme chose
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