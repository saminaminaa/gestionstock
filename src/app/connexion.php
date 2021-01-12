<?php

function connect() {
    try {
        //$db = new PDO('mysql:host=' . $config['serveur'] . ';dbname=' . $config['bd'], $config['login'], $config['mdp']);
        $db = new PDO("mysql:host=localhost;dbname=gestionstock","login4064","KkCQvRxWbbnlgFz");
    } 
    catch (Exception $e) {
        $db = NULL;
    } 
    return $db;
} 
?>


