<?php require('header.php'); ?>

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

<?php $bdd = dbConnect(); // Call Database
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
          <p class="deadline">Date limite : <?= $value['deadline']; ?></p>
        </a>
        <!-- Delete project -->
        <form method="post" action="deletProject.php">
          <imput type="hidden" name="id" value="<?php echo $value['id']?>" >
          <input type="submit" name="delete" value="Supprimer" />
        </form>
    </div>
  <?php } ?>
  </div>
</div>

<?php require('footer.php');

// Function who call Database
function dbConnect() {
  include('divers/divers.php');

  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=todo_list;charset=utf8', 'root', $mdp);
  }

  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
  return $bdd;
}
?>
