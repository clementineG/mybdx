<?php
	try
	{
		$dbh = new PDO('mysql:host=localhost;dbname=mybdx', 'root', '');
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
?>