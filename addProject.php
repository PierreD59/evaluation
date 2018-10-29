<?php
require('header.php');
require('bdd.php');

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
