<?php 
	include 'dbconnect.php';
	$entr = '';
	$requete = "SELECT * FROM compte WHERE CATEGORIE = 'Economie' order by NOM";
	$requete = $requete;
	foreach($dbh->query($requete) as $row) {
		$entr .= $row['NOM'].'|';
		$entr .= $row['DESCRIPTION'].'|';
		$entr .= $row['CATEGORIE'].'|';
	}	
	echo $entr;
?>