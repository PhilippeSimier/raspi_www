<?php

require_once 'manipBD.inc';


function getAdresse($id) {
    // connexion BD
    $bdd = connexionBD();


$requete = $bdd->prepare("select adresse from user where id = :idU ;");
$requete->bindParam(":idU", $id);
$requete->execute() or die(print_r($requete->errorInfo()));
$adresse = $requete->fetchColumn();
$requete->closeCursor();

echo json_encode($adresse);
}

function getNom($id) {
    // connexion BD
    $bdd = connexionBD();


$requete = $bdd->prepare("select nom from user where id = :idU ;");
$requete->bindParam(":idU", $id);
$requete->execute() or die(print_r($requete->errorInfo()));
$nom = $requete->fetchColumn();
$requete->closeCursor();

echo json_encode($nom);
}



function getListeUsers() {
    // connexion BD
    $bdd = connexionBD();
// utilisation de prepare plutot que query pour avoir le gestion des erreurs
     $requete = $bdd->prepare("select id,nom,prenom from user order by nom;");
     
    $requete->execute() or die(print_r($requete->errorInfo()));

    $tabUsers=array();
    
    while ($tab = $requete->fetch()) {
        array_push($tabUsers,array('id'=>$tab['id'], 'nom'=>  utf8_encode($tab['nom']), 'prenom'=>  utf8_encode($tab['prenom'])));        
    }    
    $requete->closeCursor();
    echo json_encode($tabUsers);

}

