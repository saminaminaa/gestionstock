<?php 

    require_once '../src/lib/vendor/autoload.php';
    require_once '../src/config/routing.php';
    require_once '../src/controleur/controleur_index.php';
    require_once '../src/controleur/controleur_api.php';
    require_once '../src/controleur/controleur_modifsousproduit.php';
    require_once '../src/app/connexion.php';
    require_once '../src/modele/_class.php';
    

    $loader = new Twig_Loader_Filesystem('../src/vue/');
    $twig = new Twig_Environment($loader, array());

    $db = connect(); 
    $contenu = getPage($db);
    // Exécution de la fonction souhaitée 
    $contenu($twig,$db);




?>