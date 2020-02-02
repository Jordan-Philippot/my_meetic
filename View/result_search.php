<?php require_once 'header.php';
if(!isset($_SESSION['auth'])):
    header('Location: index.php');
endif; ?>
<div class="titre">
  <h1> Les célibataires près de chez vous</h1>
</div>

<form action="../Controller/searchController.php" method="GET">
  <div id="carrousel">
    <?php for($i = 0 ; $i < sizeof($_SESSION['membres']) ; $i++): ?>

    <div class="container_result">

      <img class="profil_image" src="../webroot/Images/profil.png" alt="profil par default">
      <h2> <?= $_SESSION['membres'][$i]["prenom"].' '.$_SESSION['membres'][$i]["nom"] ?> </h2>

      <div class="toggle_search">
        <div class="form-groupe">
          <p class="profil_session"><u> Genre : </u></p> <p><?= $_SESSION['membres'][$i]["genre"] ?></p><hr>
        </div>
        
        <div class="form-groupe">
          <p class="profil_session"><u> Pour joindre  <?= $_SESSION['membres'][$i]["prenom"] ?> : </u></p> <p><?= $_SESSION['membres'][$i]["email"] ?></p><hr>
        </div>

        <?php if(isset($_SESSION['membres'][$i]["loisir2"]) && !empty($_SESSION['membres'][$i]["loisir2"]) && !is_null($_SESSION['membres'][$i]["loisir1"]) && isset($_SESSION['membres'][$i]["loisir3"]) && !empty($_SESSION['membres'][$i]["loisir3"]) && !is_null($_SESSION['membres'][$i]["loisir3"])): ?>
            <div class="form-groupe">
              <p class="profil_session"><u> Aime : </u></p> <p><?= $_SESSION['membres'][$i]["loisir1"] ?>, <?= $_SESSION['membres'][$i]["loisir2"] ?>, <?= $_SESSION['membres'][$i]["loisir3"] ?></p><hr>
            </div>

        <?php elseif(isset($_SESSION['membres'][$i]["loisir1"]) && !empty($_SESSION['membres'][$i]["loisir2"]) && !is_null($_SESSION['membres'][$i]["loisir2"])): ?>
          <div class="form-groupe">
            <p class="profil_session"><u> Aime : </u></p> <p><?= $_SESSION['membres'][$i]["loisir1"] ?>, <?= $_SESSION['membres'][$i]["loisir2"] ?></p><hr>
          </div>
          
        <?php else:?>
          <div class="form-groupe">
            <p class="profil_session"><u> Aime : </u></p> <p><?= $_SESSION['membres'][$i]["loisir1"]?></p><hr>
          </div>
        <?php endif;?>

        <div class="form-groupe">
          <p class="profil_session"><u> Habite à : </u></p> <p><?= $_SESSION['membres'][$i]["ville"] ?></p><hr>
        </div>

        <div class="form-groupe">
          <p class="profil_session"><u> Âge : </u></p> <p><?= $_SESSION['membres'][$i]["age_membre"] ?> ans</p>
        </div>
      </div>
    </div>
    <?php endfor; ?>
  </div>

<?php if(empty($_SESSION['membres'])):?>
  <div class="alert-danger_edit">
      <ul>
  <?php $danger_session_search = $_SESSION['search_null'];
  foreach($danger_session_search as $danger_search): ?>
      <li> <?= $danger_search ?> </li>
  <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

  <div class="container_button">
    <button class="search_button"><a href="search.php">Nouvelle Recherche</a></button>

    <div class="disconnect_flex">
        <p><a class="disconnect" href="index.php">Se déconnecter</a><p>
        <p><a class="disconnect" href="profil.php">Mon profil</a><p>
    </div>
  </div>
</form>
<?php require_once 'footer.php'; 
