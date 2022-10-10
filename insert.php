<?php
/**
* Clients Manager - insert.php
* @version: 1.0.0
* 
* @author: Houssem TAYECH <houssem@forticas.com>
* @copyright Copyright (c) 2022, Houssem TAYECH
*/
    

/*
* verifier si le formulaire a été soumis et si les champs sont remplis
* Le formulaire doit contenir les champs suivants :
        - Nom
        - Prénom
        - Adresse
        - Téléphone
        - Est-it actif ?
*/

if(isset($_POST['only-submit']) || isset($_POST['submit-return-index']) ) {
    // vérifier si les champs sont remplis
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['telephone']))
    {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $telephone = $_POST['telephone'];
        $actif = isset($_POST['actif']) ? 1 : 0;

        /**
         * verifier avec REGEX si le numéro de téléphone est un numéro de téléphone français valide
         * 1. Le numéro de téléphone doit commencer par 0
         * 2. Le numéro de téléphone doit avoir 10 chiffres
         * 3. Le numéro de téléphone doit être un entier
         *
         * Si le numéro de téléphone n'est pas valide, afficher un message d'erreur
         */
        if(preg_match('/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/', "'".$telephone."'")) {
            $error =  'Le numéro de téléphone n\'est pas valide'; 
        }else {
            // stucturer les données dans un tableau $client
            $client = array(
                'nom' => $nom,
                'prenom' => $prenom,
                'adresse' => $adresse,
                'telephone' => $telephone,
                'date' => date('d/m/Y H:i:s'),
                'actif' => $actif
            );

            // ouvrir le fichier clients.csv en mode écriture, s'il n'existe pas, le créer
            $file = fopen('clients.csv', 'a+');

            // écrire les données du tableau $client dans le fichier clients.csv
            fputcsv($file, $client);

            // fermer le fichier clients.csv
            fclose($file);
            
            if (isset($_POST['only-submit'])) {
                // vider le tableau $_POST
                $_POST = [];
            }else {
                // rediriger vers la page index.php
                header('Location: index.php');
            }
            
        }
    
    }else{
        $error =  'Veuillez remplir tous les champs';
    }
    
    
}

require_once 'views/insert.php';