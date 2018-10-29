<?php
require('header.php');
require('bdd.php');

          $reponse = $bdd->query('SELECT list.id, list.name FROM list WHERE list.project_id = "'.$_GET['id'].'" ');
          $donnees = $reponse->fetchAll();
            foreach ($donnees as $key => $list) { ?>

          <!-- Add list -->
            <a href="list.php?page=list&id=<?= $list['id']; ?>"><li class="list"><?=$list['name'] ?></li></a>
          <!-- Delete list -->
            <a class="btn btn-primary text-white" href="deletList.php?id=<?= $list['id']; ?>">Delet</a>

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
