<?php 
require('bdd.php');

$id = $_GET['id'];

$reponse = $bdd->query('DELETE FROM task WHERE id ="' . $_GET['id'] . '" ');
$rep = $reponse->execute();


header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
