<?php require('bdd.php');


$finished = intval($_POST['finished']);

$reponse = $bdd->query ('UPDATE task SET finished = '.$finished .' WHERE id =' . $_GET['id']);
$donnees = $reponse->fetch();

header('Location: list.php?id=' . $_GET['list_id']); ?>


