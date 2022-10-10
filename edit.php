<?php
/**
* Clients Manager - edit.php
* @version: 1.0.0
* 
* @author: Houssem TAYECH <houssem@forticas.com>
* @copyright Copyright (c) 2022, Houssem TAYECH
*/
    

// vérifier si la méthode de requête est POST
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // vérifier que la variable $_POST['id'] existe, n'est pas vide et est un nombre
    if(isset($_GET['id']) && $_GET['id'] != '' && is_numeric($_GET['id'])) {
        // récupérer la valeur de $_GET['id']
        $id = $_GET['id'];
        
        // récupérer les données du formulaire dans le tableau $client
        $client = [
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'adresse' => $_POST['adresse'],
            'telephone' => $_POST['telephone'],
            'actif' => isset($_POST['actif']) ? 1 : 0
        ];
        
        // vérifier si les champs sont remplis
        if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['telephone']))
        {
            
            if(preg_match('/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/', "'".$client['telephone']."'")) {
                $error =  'Le numéro de téléphone n\'est pas valide'; 
            }else{
                // ouvrir le fichier clients.csv en mode lecture
                $file = fopen('clients.csv', 'r');
                                
                // créer un tableau $clients
                $clients = [];

                // parcourir le fichier clients.csv
                while($client_from_csv = fgetcsv($file)) {
                    // ajouter chaque ligne du fichier clients.csv dans le tableau $clients
                    $clients[] = $client_from_csv;
                }
                
                // fermer le fichier clients.csv
                fclose($file);
                
                // modifier le client dont l'id est égal à la valeur de $_GET['id']
                $clients[$id][0] = $client['nom'];
                $clients[$id][1] = $client['prenom'];
                $clients[$id][2] = $client['adresse'];
                $clients[$id][3] = $client['telephone'];
                $clients[$id][5] = $client['actif'];
                
                // ouvrir le fichier clients.csv en mode écriture
                $file = fopen('clients.csv', 'w');

                // parcourir le tableau $clients
                foreach($clients as $client_to_csv) {
                    // écrire chaque ligne du tableau $clients dans le fichier clients.csv
                    fputcsv($file, $client_to_csv);
                }

                // fermer le fichier clients.csv
                fclose($file);

                // rediriger vers la page index.php
                header('Location: index.php');
            }
            
        }else{
            $error = 'Veuillez remplir tous les champs';
        }
    }
}else{
    // vérifier que la variable $_GET['id'] existe, n'est pas vide et est un nombre
    if(isset($_GET['id']) && $_GET['id'] != '' && is_numeric($_GET['id'])) {
        // récupérer la valeur de $_GET['id']
        $id = $_GET['id'];
        
        // ouvrir le fichier clients.csv en mode lecture
        $file = fopen('clients.csv', 'r');
        
        // créer un compteur
        $i = 0;
        
        // parcourir le fichier clients.csv
        while($client_from_csv = fgetcsv($file)) {
            if($i == $id) {
                $client = [
                    'nom' => $client_from_csv[0],
                    'prenom' => $client_from_csv[1],
                    'adresse' => $client_from_csv[2],
                    'telephone' => $client_from_csv[3],
                    'actif' => $client_from_csv[5]
                ];
                break;
            }
            $i++;
        }
        
        // fermer le fichier clients.csv
        fclose($file);
    }
}

require_once 'views/edit.php';