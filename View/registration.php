<?php require_once 'header.php';?>
<!--___________________________________________________ VIEW_____________________________________-->

<div class="container">

      <h1>Sign Up <br></h1>
      <h3>Trouvez l'amour près de chez vous en quelques clics : </h3>
    
<?php if(!empty($_SESSION['error'])):?>
  <div class="alert-danger_signup">
    <p>Vous n'avez pas rempli le formulaire correctement : </p>
      <ul>
        <?php $error_session = $_SESSION['error'];
        foreach($error_session as $errors):?>
            <li> <?= $errors; ?> </li>
        <?php endforeach; ?>
      </ul>
  </div>
  <?php endif; ?>
    <form action="../Controller/membersController.php" method="POST">
      <div class="form-section">
        <div class="form-group">
          <input type="text" name="nom" class="form-control" placeholder="Nom" minlength="2" maxlength="30" />
        </div>

        <div class="form-group">
          <input type="text" name="prenom" class="form-control" placeholder="Prénom" minlength="2" maxlength="30"/>
        </div>
      </div>

      <div class="form-section">
        <div class="form-group">
          <input  id="naissance" type="date" name="date_naissance" class="form-control"/>
        </div>
      
        <div class="form-group">
          <select name="genre" id="genre">
            <option value="">Genre</option>
            <option value="homme" id="homme">Homme</option>
            <option value="femme" id="femme" >Femme</option>
            <option value="autre" id="autre">Autre</option>
          </select>
        </div>
      </div>

      <div class="form-section">
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="email@" minlength="5" maxlength="30"/>
        </div>

        <div class="form-group">
          <input type="text" name="ville" class="form-control" placeholder="Ville" minlength="2" maxlength="30"/>
        </div>
      </div>

      <div class="form-section">
         <div class="form-group">
          <input type="text" name="loisir1" class="form-control" placeholder="Loisir 1" minlength="2" maxlength="30"/>
        </div>

        <div class="form-group">
          <input type="text" name="loisir2" class="form-control" placeholder="Loisir 2" minlength="2" maxlength="30"/>
        </div>
      </div>

      <div class="form-section">
        <div class="form-group">
          <input type="text" name="loisir3" class="form-control" placeholder="Loisir 3" minlength="2" maxlength="30"/>
        </div>
      
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Mot de passe" minlength="3" maxlength="40"/>
        </div>
      </div>
      
      <div class="form-group">
        <input type="password" name="password_confirm" class="form-control" placeholder="Confirmer mot de passe" minlength="3" maxlength="40"/>
      </div>

      <div>
        <p><a class="connec" href="connection.php"> Se connecter </a><p>
      </div>  
  
      <button type="submit" class="subscrib"> S'incrire </button>

    </form>
</div>
<?php require_once 'footer.php'; ?>

