<?php
try

{
  $bdd = new PDO('mysql:host=localhost;dbname=todo_list;charset=utf8', 'root');
}

catch(Exception $e)

{
  die('Erreur : '.$e->getMessage());
}


$reponse = $bdd->prepare('DELETE FROM project WHERE id ="'. $_POST['id'] . '"');
$rep = $reponse->execute();

?>
