<?php 
    function getPage($db){
        $lesPages['accueil'] = "actionAccueil";
        $lesPages['ajout-type'] = "actionAjoutType";
        $lesPages['ajout-sousproduit'] = "actionAjoutSousproduit";
        $lesPages['maintenance']= "actionMaintenance";
        $lesPages['api-modif-com']= "actionApiModifCom";
        $lesPages['api-augmenter-qte']= "actionApiAugmenterQte";
        $lesPages['api-baisser-qte']= "actionApiBaisserQte";
        $lesPages['modif-sousproduit']= "actionModifSousproduit";
        $lesPages['api-recherche-produit']= "actionApiRechercheProduit";

      /*   if ($db == NULL) {
            return "nous ne trouvons pas de bd";
        } else { */

/*         if ($db != NULL) {
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 'accueil';
            }

            if (!isset($lesPages[$page])) {
                $page = 'accueil';
            }
        } else{
            $contenu = 'actionMaintenance';
        }
        return $contenu;
    } */

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






    // }
?>
