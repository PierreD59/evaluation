<?php
require('divers/divers.php');
require('header.php');

try {
    $bdd = new PDO('mysql:host=localhost;dbname=todo_list;charset=utf8', 'root', $mdp);
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}

$name = htmlspecialchars($_POST['name_task']);
$content = htmlspecialchars($_POST['content']);
$deadline = htmlspecialchars($_POST['deadline']);
$list_id = (int)$_GET['id'];

if (!empty($name) AND isset($name) AND isset($content) AND !empty($content) AND isset($deadline) AND !empty($deadline)) {
    $req = $bdd->prepare("INSERT INTO task(name, content, deadline, list_id) VALUES(:name, :content, :deadline, :list_id)");
    $req->execute(array(
    ':name' => $name,
    ':content' => $content,
    ':deadline' => $deadline,
    ':list_id' => $list_id
));

header('Location: list.php?id='.$list_id);
} else {
    echo "Error 404 !";
}