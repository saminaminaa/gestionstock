<?php
function actionModifSousproduit($twig, $db){
    $form = array();
    if(isset($_GET['id'])){
        $sousproduit = new Sousproduit($db);

        $unSousproduit = $sousproduit->selectById($_GET['id']);
        if ($unSousproduit!=null){
            $form['sousproduit'] = $unSousproduit;
        }
            else{
                $form['message'] = 'Produit incorrect';
                }
                }
                else{
                     if(isset($_POST['btModifier'])){
                         $sousproduit = new Sousproduit($db);
                         $id = $_POST['id'];
                         $libelle = $_POST['libelle'];
                         $qte = $_POST['qte'];
                         $fabricant = $_POST['fabricant'];
                         $commentaire = $_POST['commentaire'];
                         $seuil = $_POST['seuil'];
                         $exec=$sousproduit->updateAll($id, $libelle, $qte, $fabricant, $commentaire, $seuil);
                         if(!$exec){
                             $form['valide'] = false;
                         $form['message'] = 'Échec de la modification';
                         }
                         else{
                             $form['valide'] = true;
                             $form['message'] = 'Modification réussie';
                             }
                             }
                             else{
                    $form['message'] = 'Produit non précisé';
                    }
                }
                echo $twig->render('modif-sousproduit.html.twig', array('form'=>$form));
            }
?>