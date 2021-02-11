<?php 

//fichier permettant de gérer les routes
    function getPage($db){
        //Fonction pour les pages
        $lesPages['accueil'] = "actionAccueil";
        $lesPages['ajout-type'] = "actionAjoutType";
        $lesPages['ajout-sousproduit'] = "actionAjoutSousproduit";
        $lesPages['maintenance']= "actionMaintenance";
        $lesPages['api-modif-com']= "actionApiModifCom";
        $lesPages['api-augmenter-qte']= "actionApiAugmenterQte";
        $lesPages['api-baisser-qte']= "actionApiBaisserQte";
        $lesPages['modif-sousproduit']= "actionModifSousproduit";
        $lesPages['api-recherche-produit']= "actionApiRechercheProduit";
        $lesPages['recherche']= "actionRecherche";

        //Si la page est connu on redirige vers cette page.
        //Si la page n'est pas connu on redirige vers la page d'accueil.
        if(isset($_GET['page'])){
            $page = $_GET['page']; 
        } else{
            $page = 'accueil'; 
        }
        if (!isset($lesPages[$page])){
            $page = 'accueil'; 
        }
        $contenu = $lesPages[$page];
        return $contenu; 
    }
?>
