<?php
require('header.php');
require('divers/divers.php');
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=todo_list;charset=utf8', 'root', $mdp);
}
catch(Exception $e)
{
  die('Erreur : '.$e->getcontent());
}

  $reponse = $bdd->query('SELECT * FROM project WHERE id = "'.$_GET['id'].'" ');
  $donnees = $reponse->fetchAll();
  foreach ($donnees as $key => $project) { ?>

<div class="container-fluid">
  <div class="row m-0 p-0 justify-content-center">

      <div class="project-img">
        <img src="#" alt="project_img">
        <p class="deadline-project text-center"><?= $project['deadline'];?></p>
      </div>
      <div class="spec-product col-md-4 m-auto">
        <p class="name"><?= $project['name'];?></p>
        <p class="content"><?= $project['content'];?></p>
        <ul>
          <?php

          try
          {
            $bdd = new PDO('mysql:host=localhost;dbname=todo_list;charset=utf8', 'root', $mdp);
          }
          catch(Exception $e)
          {
            die('Erreur : '.$e->getcontent());
          }

          $reponse = $bdd->query('SELECT list.id, list.name FROM list WHERE list.project_id = "'.$_GET['id'].'" ');
          $donnees = $reponse->fetchAll();
            foreach ($donnees as $key => $list) { ?>

          <!-- Add list -->
            <a href="list.php?page=list&id=<?= $list['id']; ?>"><li class="list"><?=$list['name'] ?></li></a>
            <?php } ?>
          <?php } ?>
        </ul>
      </div>
  </div>
</div>

<form method="post" action="addList.php?id=<?= $_GET['id'] ?>" class="mb-3 mt-3">
  <p>
    <label for="name_list">List name : </label><br>
    <input type="text" name="name_list" id="name_list" required/>
  </p>
    <input type="submit" value="Envoyer" />
</form>
<?php require('footer.php'); ?>
