<?php
session_start();
//si l'utilisateur n'est pas connecter on l'envoie vers la connexion.
if (!isset($_SESSION['utilisateur'])) {
    header('location: ../connexion.php');
}

// recuperation des donnees de post (counter.php).
$id = $_POST['id'];
$qty = $_POST['qty'];
// recuperation id d'utilisateur.
$idUtilisateur = $_SESSION['utilisateur']['id'];
// si l'utilisateur n'a pas leur panier.
if (!isset($_SESSION['panier'][$idUtilisateur])) {
    $_SESSION['panier'][$idUtilisateur] = []; //donner a l'utilisateur leur panier.
}
if($qty == 0){ //si la qty d'un produit = 0
    unset($_SESSION['panier'][$idUtilisateur][$id]);//supprimer le produit de panier
}else{
    $_SESSION['panier'][$idUtilisateur][$id] = $qty; //stocker la qty
}

header("location:".$_SERVER['HTTP_REFERER']);//pour retourner a la page presedante

