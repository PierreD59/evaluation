<?php try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=todo_list;charset=utf8', 'root');
  }

  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
?>
<?php

$finished = intval($_POST['finished']);

$reponse = $bdd->query ('UPDATE task SET finished = '.$finished .' WHERE id =' . $_GET['id']);
$donnees = $reponse->fetch();

header('Location: list.php?id=' . $_GET['list_id']); ?>


