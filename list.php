<?php
require('header.php');
require('divers/divers.php');
try {
    $bdd = new PDO('mysql:host=localhost;dbname=todo_list;charset=utf8', 'root', $mdp);
} catch (Exception $e) {
    die('Erreur : '.$e->getcontent());
}

  $reponse = $bdd->query('SELECT * FROM list WHERE id = "'.$_GET['id'].'" ');
  $donnees = $reponse->fetchAll();
  foreach ($donnees as $key => $list) {
      ?>

<div class="container-fluid">
  <div class="row m-0 p-0 justify-content-center">

      <div class="spec-product col-md-4 mt-5">
        <p class="name">list_name : <?= $list['name']; ?></p>
          <?php
          try {
              $bdd = new PDO('mysql:host=localhost;dbname=todo_list;charset=utf8', 'root', $mdp);
          } catch (Exception $e) {
              die('Erreur : '.$e->getcontent());
          }

      $reponse = $bdd->query('SELECT task.id, task.name, content, deadline, list_id FROM task WHERE task.list_id = "'.$_GET['id'].'" ');
      $donnees = $reponse->fetchAll();
      foreach ($donnees as $key => $task) {
          ?>
          <!-- Add task -->
        <table>
          <tr><?= $task['name'] ?></tr>
          <td><?= $task['content'] ?></td>
          <td><?= $task['deadline'] ?></td>
        </table>
  <?php } ?>
<?php } ?>

      </div>
  </div>
</div>

<form method="post" action="addTask.php?id=<?= $_GET['id'] ?>" class="mb-3 mt-3">
  <p>
    <label for="name_task">Task name : </label><br>
    <input type="text" name="name_task" id="name_task" required/>
  </p>
    <p>
    <label for="content">Content : </label><br>
    <input type="text" name="content" id="content" required/>
  </p>
    <p>
    <label for="deadline">Deadline : </label> <br>
    <input type="date" name="deadline" id="deadline" required/>
  </p>
  
    <input type="submit" value="Envoyer" />
</form>
<?php require('footer.php'); ?>