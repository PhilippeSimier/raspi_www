<!DOCTYPE html>

<?php
include "authentification/authcheck.php" ;

require_once('../ini/ini.php');
require_once('../definition.inc.php');

function reduire( $chaine ){
	
	if ( strlen($chaine) > 60){
		$chaine = substr( $chaine, 0, 60) . '...';	
	}
return $chaine;	
}


// Si le formulaire à été soumis
if(isset($_POST['btn_supprimer'])){
	// Si un élément a été sélectionné
	if (count($_POST['table_array']) > 0){
		$Clef=$_POST['table_array'];
		$supp = "(";
		foreach($Clef as $selectValue)
		{
			if($supp!="("){$supp.=",";}
			$supp.=$selectValue;
		}
		$supp .= ")";
		var_dump($supp);
		// connexion à la base
		$bdd = new PDO('mysql:host=' . SERVEUR . ';dbname=' . BASESMS, UTILISATEUR,PASSE);
		$sql = "DELETE FROM `sentitems` WHERE `ID` IN " . $supp;
		$bdd->exec($sql);
	}
	unset($_POST['table_array']);

}

?>

<html>
<head>
    <title>Sent</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <!-- Bootstrap CSS version 4.1.1 -->
    <link rel="stylesheet" href="/Ruche/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Ruche/css/ruche.css" />
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="/Ruche/scripts/bootstrap.min.js"></script> 
    
 </head>

 <body>
	<?php require_once '../menu.php'; 	?>
	<div class="container" style="padding-top: 65px;">
		<div class="row popin">
			
			<div class="col-md-12 col-sm-12 col-xs-12">
			
			<?php
							include('paginator.class.php');
						    $pages = new Paginator;
							$pages->default_ipp = 10;  // 10 lignes par page
							
							// connexion à la base
							$bdd = new PDO('mysql:host=' . SERVEUR . ';dbname=' . BASESMS, UTILISATEUR,PASSE);
							// Comptage des lignes dans la table 
							$sql = "SELECT COUNT(*) as nb FROM `sentitems`"; 
							$stmt = $bdd->query($sql);
							$res =  $stmt->fetchObject();
							$pages->items_total = $res->nb;
							$pages->mid_range = 9;
							$pages->paginate();  


							
							
							echo '<div class="row marginTop">';
                            echo '<div class="col-sm-12 paddingLeft pagerfwt">';
							if($pages->items_total > 0) { 
								echo $pages->display_pages();
								echo $pages->display_total();
							}
							echo '</div>';
							
			
			?>
			
				
				<div class="table-responsive">
					<form method="post">
					<table class="table table-striped">
						<thead>
						  <tr>
							<th>Date Time</th>
							<th>To</th>
							<th>Body</th>
							<th>Creator</th>
							<th></th>
						  </tr>
						</thead>
						<tbody>
							
							<?php
								$sql = "SELECT `SendingDateTime`,`DestinationNumber`,`TextDecoded`,`CreatorId`,`ID` FROM `sentitems` order by `SendingDateTime` desc ". $pages->limit;
								
								$stmt = $bdd->query($sql);
								
								while ($message =  $stmt->fetchObject()){
									echo "<tr><td>" . $message->SendingDateTime . "</td>";
									echo "<td>" . $message->DestinationNumber . "</td>";
									echo "<td>" . utf8_encode(reduire($message->TextDecoded)) . "</td>";
									echo "<td>" . $message->CreatorId . "</td>";
									echo "<td><input type='checkbox' name='table_array[$message->ID]' value='$message->ID'></td></tr>";
								}
							?>
						</tbody>
					</table>
					<input type="submit" name="btn_supprimer" value="Supprimer">
					</form>	
				</div>
				
			
			
			
	
		</div>
		<?php require_once '../piedDePage.php'; ?>
	</div>	
	
</body>
</html>
	