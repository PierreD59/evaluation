<?php
require('header.php');

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=todo_list;charset=utf8', 'root');
}

catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

var_dump($bdd);

$name = htmlspecialchars($_POST['name_list']);
$project_id = (int)$_GET['id'];

if(!empty($name) AND isset($name))
{    

$req = $bdd->prepare("INSERT INTO list(name, project_id) VALUES(:name, :project_id)");
$req->execute(array(
    ':name' => $name,
    ':project_id' => $project_id
));

header('Location: project.php?id='.$project_id);
}
else
{
  echo "Error 404 !";
}
