<?php

require_once("config.inc.php");

function connexionBD() {
    try {

        $bdd = new PDO('mysql:host=' . SERVEURBD . ';dbname=' . NOMDELABASE, LOGIN, MOTDEPASSE);
    } catch (Exception $ex) {
        die('<br />Pb connexion serveur BD : ' . $ex->getMessage());
    }
    return $bdd;
}

// retourne les valeurs sous le format tableau d'objets
// [{"id":"1999","valeur":"22.56","date":"2016-04-28 10:00:01"},{"id":"1998","valeur":"22.5","date":"2016-04-28 09:50:01"}, ....]

function getTemperature($nb) {
    $bdd = connexionBD();

    $requete = $bdd->prepare("SELECT * FROM `temperature` ORDER BY `id` DESC LIMIT 12");
    $requete->bindParam(":nb", $nb);
    $requete->execute() or die(print_r($requete->errorInfo()));

    $data = array();
    
    while ($ligne = $requete->fetch()) {
        array_push($data, array( 'id'=>$ligne['id'], 'valeur'=>$ligne['valeur'],  'date'=>$ligne['date']));        
    }
    
    $requete->closeCursor();
    echo json_encode($data);

}

// retourne les valeurs sous le format tableau de data
// ["22.56","22.5","22.5","22.56","22.56","22.5","22.44","22.44","22.38","22.31","22.25","22.13"]


function getData($to) {
    $bdd = connexionBD();
	

    $requete = $bdd->prepare("SELECT * FROM `temperature` WHERE date BETWEEN :to AND now() ORDER BY `id` ASC;");
    $requete->bindParam(":to", $to);
    $requete->execute() or die(print_r($requete->errorInfo()));

    $valeur = array();
	    
    while ($ligne = $requete->fetch()) {
        array_push($valeur, $ligne['valeur']);	
    }
	
	$options['title'] = "du ".substr($to, 0, -14);
	$options['debug'] = $to;
	$options['subtitle'] = "capteur sur ".$_SERVER["SERVER_NAME"];
	
	$to1 = substr($to, 0, -6)."+0000";
	$options['to'] = strtr($to1, " ", "T");  //la date au format ISO 8601
	
	$data['name']  = "Temperature";
	$data['data']  = $valeur;
	
	$options[serie] = $data;
	
	
	$requete->closeCursor();
    echo json_encode($options, JSON_NUMERIC_CHECK);

}

?>



