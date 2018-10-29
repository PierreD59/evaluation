<?php require('header.php'); 
require('bdd.php'); ?>

<form method="post" action="addProject.php" class="mt-3">
  <p>
    <label for="name">Project name : </label><br>
    <input type="text" name="name" id="name" required/>
  </p>
  <p>
    <label for="content">Content : </label> <br>
    <input type="text" name="content" id="content" required/>
  </p>
  <p>
    <label for="deadline">Deadline : </label> <br>
    <input type="date" name="deadline" id="deadline" required/>
  </p>
  <input type="submit" value="Envoyer" />
</form>

<?php
  $reponse = $bdd->query('SELECT * FROM project ORDER BY id');
  $donnees = $reponse->fetchAll();


?>
<div class="container-fluid mt-3 mb-5">
  <div class="row m-0 p-0">
  <?php
  foreach ($donnees as $value) {
  ?>
  <!-- Select project -->
    <div class="project mb-5">
        <a href="project.php?page=project&id=<?= $value['id']; ?>">
          <h2 class="name"><?= $value['name']; ?> </h2>
          <p class="content"><?= $value['content']; ?> </p>
          <p class="deadline">Deadline : <?= $value['deadline']; ?></p>
        </a>
          <!-- Delete project -->
            <a class="btn btn-primary text-white" href="deletProject.php?id=<?= $value['id']; ?>">Delet</a>
    </div>
  <?php } ?>
  </div>
</div>

<?php require('footer.php');