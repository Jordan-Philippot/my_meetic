<?php require_once 'header.php';
if(!isset($_SESSION['auth'])):
    header('Location: index.php');
endif; ?>
    <div class="titre">
      <h1> Les célibataires près de chez vous</h1>
    </div>

    <form action="../Controller/searchController.php" method="GET">
    
    <?php for($i = 0 ; $i < sizeof($_SESSION['membres']) ; $i++): ?>

      <div class="container_result">
        <div class="form-groupe">
          <p class="profil_session"><u> Genre </u> : </p> <p><?= $_SESSION['membres'][$i]["genre"] ?></p>
        </div>

        <div class="form-groupe">
          <p class="profil_session"><u> Prénom </u> : </p> <p> <?= $_SESSION['membres'][$i]["prenom"] ?></p>
        </div>

        <div class="form-groupe">
          <p class="profil_session"><u> Nom </u>: </p> <p> <?= $_SESSION['membres'][$i]["nom"] ?></p>
        </div>

        <div class="form-groupe">
          <p class="profil_session"><u> Email </u> : </p> <p><?= $_SESSION['membres'][$i]["email"] ?></p>
        </div>

        <?php if(isset($_SESSION['membres'][$i]["loisir2"]) && !empty($_SESSION['membres'][$i]["loisir2"]) && !is_null($_SESSION['membres'][$i]["loisir1"]) && isset($_SESSION['membres'][$i]["loisir3"]) && !empty($_SESSION['membres'][$i]["loisir3"]) && !is_null($_SESSION['membres'][$i]["loisir3"])): ?>
            <div class="form-groupe">
              <p class="profil_session"><u> Loisirs </u> : </p> <p><?= $_SESSION['membres'][$i]["loisir1"] ?>, <?= $_SESSION['membres'][$i]["loisir2"] ?>, <?= $_SESSION['membres'][$i]["loisir3"] ?></p>
            </div>

        <?php elseif(isset($_SESSION['membres'][$i]["loisir1"]) && !empty($_SESSION['membres'][$i]["loisir2"]) && !is_null($_SESSION['membres'][$i]["loisir2"])): ?>
          <div class="form-groupe">
            <p class="profil_session"><u> Loisirs </u> : </p> <p><?= $_SESSION['membres'][$i]["loisir1"] ?>, <?= $_SESSION['membres'][$i]["loisir2"] ?></p>
          </div>
          
        <?php else:?>
          <div class="form-groupe">
            <p class="profil_session"><u> Loisirs </u> : </p> <p><?= $_SESSION['membres'][$i]["loisir1"]?></p>
          </div>
        <?php endif;?>

        <div class="form-groupe">
          <p class="profil_session"><u> Ville </u> : </p> <p><?= $_SESSION['membres'][$i]["ville"] ?></p>
        </div>

        <div class="form-groupe">
          <p class="profil_session"><u> Date de naissance </u> : </p> <p><?= $_SESSION['membres'][$i]["date_naissance"] ?></p>
        </div>
        
      </div>
      <?php endfor; ?>


      <button class="search_button"><a href="search.php">Nouvelle Recherche</a></button>

      <div class="disconnect_flex">
          <p><a class="disconnect" href="index.php">Se déconnecter</a><p>
          <p><a class="disconnect" href="profil.php">Mon profil</a><p>
      </div>
    </form>
<?php require_once 'footer.php'; 
