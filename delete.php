<?php
/**
* Clients Manager - delete.php
* @version: 1.0.0
* 
* @author: Houssem TAYECH <houssem@forticas.com>
* @copyright Copyright (c) 2022, Houssem TAYECH
*/


// vérifier que la variable $_GET['id'] existe, n'est pas vide et est un nombre
if(isset($_GET['id']) && $_GET['id'] != '' && is_numeric($_GET['id'])) {
    // récupérer la valeur de $_GET['id']
    $id = $_GET['id'];
    
    // ouvrir le fichier clients.csv en mode lecture
    $file = fopen('clients.csv', 'r');
    
    // créer un tableau $clients
    $clients = [];
    
    // parcourir le fichier clients.csv
    while($client = fgetcsv($file)) {
        // ajouter chaque ligne du fichier clients.csv dans le tableau $clients
        $clients[] = $client;
    }
    
    // fermer le fichier clients.csv
    fclose($file);
    
    // supprimer le client dont l'id est égal à la valeur de $_GET['id']
    unset($clients[$id]);
    
    // ouvrir le fichier clients.csv en mode écriture
    $file = fopen('clients.csv', 'w');
    
    // parcourir le tableau $clients
    foreach($clients as $client) {
        // écrire chaque ligne du tableau $clients dans le fichier clients.csv
        fputcsv($file, $client);
    }
    
    // fermer le fichier clients.csv
    fclose($file);
    
}

// rediriger vers la page index.php
header('Location: index.php');