<?php require_once '../View/header.php';?>

  <div class="container_profil">

 
    <div class="">
      <h1 class="">Votre profil <br></h1>
    </div>

    <div class="profil_block">
        <?php
      if(isset($_SESSION['auth'])){
      echo '<div class="form-groupe">
            <p class="profil_session"><u>Prénom</u> : </p><p> '.$_SESSION['auth'][6].'</p>
          </div>

          <div class="form-groupe">
            <p class="profil_session"><u>Nom</u>: </p><p> '.$_SESSION['auth'][5].'</p>
          </div>

          <div class="form-groupe">
            <p class="profil_session"><u>Email</u> : </p><p>'.$_SESSION['auth'][9].'</p>
          </div>
        
          <div class="form-groupe">
            <p class="profil_session"><u>Genre</u> : </p><p> '.$_SESSION['auth'][8].'</p>
          </div>

          <div class="form-groupe">
            <p class="profil_session"><u>Ville</u> : </p><p>'.$_SESSION['auth'][4].'</p>
          </div>

          <div class="form-groupe">
             <p class="profil_session"><u>Date de naissance</u> : </p><p>'.$_SESSION['auth'][7].'</p>
          </div>';
          if(isset($_SESSION['auth'][2]) && !empty($_SESSION['auth'][2]) && !is_null($_SESSION['auth'][2]) && isset($_SESSION['auth'][3]) && !empty($_SESSION['auth'][3]) && !is_null($_SESSION['auth'][3])){
          echo '<div class="form-groupe">
             <p class="profil_session"><u>Loisirs</u> : </p><p>'.$_SESSION['auth'][1].', '.$_SESSION['auth'][2].', '.$_SESSION['auth'][3].'</p>
          </div>';
          }
          elseif(isset($_SESSION['auth'][2]) && !empty($_SESSION['auth'][2]) && !is_null($_SESSION['auth'][2])){
            echo '<div class="form-groupe">
             <p class="profil_session"><u>Loisirs</u> : </p><p>'.$_SESSION['auth'][1].', '.$_SESSION['auth'][2].'</p>
          </div>';
          }
          else{
            echo '<div class="form-groupe">
             <p class="profil_session"><u>Loisirs</u> : </p><p>'.$_SESSION['auth'][1].'</p>
          </div>';
          }
          
          echo '<div class="form-groupe">
            <p class="profil_session"><u>Mot de passe</u> : </p><p> ******** </p>
          </div>
        

        <div class="form-groupe">
          <p class="profil_session"><u>Date d\'inscription</u> : </p><p>'.$_SESSION['auth'][11].'<br></p>
        </div>


        <form action="edit.php" method="get">
          <button type="submit" id="edit_button">Modifier mon compte</button>
        </form>

        <div>
          <p><a id="disconnect" href="connection.php">Se déconnecter</a><p>
        </div>

    </div>';}?>
  </div>

<?php require_once '../View/footer.php';