<?php

/**
* Clients Manager - index.php
* @version: 1.0.0
* 
* @author: Houssem TAYECH <houssem@forticas.com>
* @copyright Copyright (c) 2022, Houssem TAYECH
*/


// vérifier si le fichier clients.csv existe
if(file_exists('clients.csv')){
    // ouvrir  fichier clients.csv en mode lecture
    $file = fopen('clients.csv', 'r');

    // lire le fichier clients.csv ligne par ligne
    $clients = [];
    while($client = fgetcsv($file)) {
        $clients[] = $client;
    }

    // fermer le fichier clients.csv
    fclose($file);
}

require_once 'views/index.php';
