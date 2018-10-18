<?php
require('divers/divers.php');
require('header.php');

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=todo_list;charset=utf8', 'root', $mdp);
}

catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
$name = htmlspecialchars($_POST['name']);
$content = htmlspecialchars($_POST['content']);
$deadline = htmlspecialchars($_POST['deadline']);

if(isset($name) AND !empty($name) AND isset($content) AND !empty($content) AND isset($deadline) AND !empty($deadline))
{
$req = $bdd->prepare('INSERT INTO project(name, content, deadline) VALUES(:name, :content, :deadline)');
$req->execute(array(
    'name' => $name,
    'content' => $content,
    'deadline' => $deadline
    ));

header('Location: index.php');
}
else
{
  echo "Error 404 !";
}