<?php
//ce fichier sert à la connexion à la base de données
function connect() {
    //on essaie de se connecter
    try {
        //$db = new PDO('mysql:host=' . $config['serveur'] . ';dbname=' . $config['bd'], $config['login'], $config['mdp']);
        $db = new PDO("mysql:host=localhost;dbname=gestionstock2","root","");
    } 
    //si la connexion échoue :
    catch (Exception $e) {
        $db = NULL;
    } 
    return $db;
} 
?>


