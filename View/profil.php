<?php 
require_once '../View/header.php';
require_once '../Controller/profilController.php';
error_reporting(E_ALL);
$member = new ProfilController();
$membre = $member->ProfilerController(); 
 if(!empty($_SESSION['success_edit']) && isset($_SESSION['auth'])): ?>
        <div class="alert-succes_edit">
            <ul>
        <?php $success_session_edit = $_SESSION['success_edit'];
        foreach($success_session_edit as $success_edit): ?>
            <li> <?= $success_edit ?> </li>
        <?php endforeach; ?>
        </ul>
    </div>
        <?php endif; ?>

  <div class="container_profil">

      <h1>Votre profil <br></h1>
    <?php if(isset($_SESSION['auth'])):?>
      <div class="profil_block">
  
      <div class="form-groupe">
        <p class="profil_session"><u> Prénom </u> : </p> <p> <?= $membre['prenom'] ?></p>
      </div>

      <div class="form-groupe">
        <p class="profil_session"><u> Nom </u>: </p> <p> <?= $membre['nom'] ?></p>
      </div>

      <div class="form-groupe">
        <p class="profil_session"><u> Email </u> : </p> <p><?= $membre['email'] ?></p>
      </div>
    
      <div class="form-groupe">
        <p class="profil_session"><u> Genre </u> : </p> <p><?= $membre['genre'] ?></p>
      </div>

      <div class="form-groupe">
        <p class="profil_session"><u> Ville </u> : </p> <p><?= $membre['ville'] ?></p>
      </div>

      <div class="form-groupe">
        <p class="profil_session"><u> Date de naissance </u> : </p> <p><?= $membre['date_naissance'] ?></p>
      </div>
        <?php if(isset($membre['loisir2']) && !empty($membre['loisir2']) && !is_null($membre['loisir2']) && isset($membre['loisir3']) && !empty($membre['loisir3']) && !is_null($membre['loisir3'])): ?>
          <div class="form-groupe">
            <p class="profil_session"><u> Loisirs </u> : </p> <p><?= $membre['loisir1'] ?>, <?= $membre['loisir2'] ?>, <?= $membre['loisir3'] ?></p>
          </div>

        <?php elseif(isset($membre['loisir2']) && !empty($membre['loisir2']) && !is_null($membre['loisir2'])): ?>
          <div class="form-groupe">
            <p class="profil_session"><u> Loisirs </u> : </p> <p><?= $membre['loisir1'] ?>, <?= $membre['loisir2'] ?></p>
          </div>
        
        <?php else:?>
          <div class="form-groupe">
            <p class="profil_session"><u> Loisirs </u> : </p> <p><?= $membre['loisir1']?></p>
          </div>
        <?php endif;?>
      
      <div class="form-groupe">
        <p class="profil_session"><u> Mot de passe </u> : </p> <p> ******** </p>
      </div>
    

      <div class="form-groupe">
        <p class="profil_session"><u> Date d'inscription </u> : </p><p><?= $membre['date_inscription'] ?><br></p>
      </div>


      <form action="edit.php" method="get">
        <button type="submit" class="edit_button">Modifier mon compte</button>
      </form>
        <div class="disconnect_flex">

      <div class="disconnect_flex">
        <div>
          <p><a class="disconnect" href="connection.php">Se déconnecter</a><p>
        </div>
        <div>
          <p><a class="disconnect" href="search.php">Rechercher membres</a><p>
        </div>
      </div>

    </div>
    <?php else:?>
      <div class="alert-danger">
        <p class="anonymous">Vous n'êtes pas connecté</p>
      </div>
    <?php endif;?>
  </div>
<?php require_once '../View/footer.php';
