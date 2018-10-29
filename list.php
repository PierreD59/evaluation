<?php
require('header.php');
require('bdd.php');

$reponse = $bdd->query('SELECT * FROM list WHERE id =' . $_GET['id']);
$donnees = $reponse->fetchAll();
foreach ($donnees as $key => $list) {
?>

<div class="container-fluid">
  <div class="row m-0 p-0 justify-content-center">

      <div class="spec-product col-md-4 mt-5">
        <p class="name">List_name : <?= $list['name']; ?></p>

          <?php $reponse = $bdd->query('SELECT task.id, task.name, task.finished, content, deadline, list_id FROM task WHERE task.list_id = ' . $_GET['id']);
          $donnees = $reponse->fetchAll();
          foreach ($donnees as $key => $task) { ?>

            <!-- Add task -->
            <table class="finished">
              <tr><?= $task['name']; ?></tr>
              <td><?= $task['content']; ?></td>
              <td><?= $task['deadline']; ?></td>
              <td>
                <form method="post" action="validTask.php?id=<?= $task['id'] ?>&list_id=<?= $_GET['id'] ?>">

                  <?php if ($task['finished']==true) { ?>
                      <input name="finished" type="hidden" value="0">
                      <input name="submit" id="btn-valid" class="btn btn-success" type="submit" value="Fini">
                  <?php } else { ?>
                      <input name="finished" type="hidden" value="1">
                      <input name="submit" id="btn-reset" class="btn btn-danger" type="submit" value="En cours">
                  <?php } ?>
                <!-- Delete project -->
              </td>   
              <td><a class="btn btn-primary text-white" href="deletTask.php?id=<?= $task['id'] ?>&list_id=<?= $_GET['id'] ?>">Delet</a></td>
              </form>
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