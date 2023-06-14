<?php
session_start();
require('config.php');


//require_once('vendor/autoload.php'); // Inclure la bibliothèque Stripe



$token = $_POST['stripeToken']; // Obtenir le token de paiement depuis le formulaire

try {

	\Stripe\Stripe::setVerifySslCerts(false); // désactive la vérification des certificats SSL (temporairement)

    // Créer un objet de charge Stripe en utilisant les informations du formulaire
    $charge = \Stripe\Charge::create(array(
        'amount' => 1000, // Le montant à facturer en cents
        'currency' => 'eur', // La devise de la transaction
        'source' => $token, // Le token de paiement
        'description' => 'Exemple de paiement avec Stripe' // La description de la transaction
    ));
    
    // Afficher les informations sur la transaction
    //echo 'La transaction a été effectuée avec succès ! Voici les informations de la transaction :';
    // echo '<pre>';
    // print_r($charge);
    // echo '</pre>';


    header('location:../panier.php?is_success=true');

    exit;

    
} catch (Exception $e) {
    // En cas d'erreur, afficher un message d'erreur et arrêter l'exécution du script
    echo 'Une erreur est survenue : ' . $e->getMessage();
    exit;
}



?>