<?php
require_once 'header.php';?>
<!--___________________________________________________ VIEW_____________________________________-->

<div class="container">

  <section class="">
    <div class="">
      <h1 class="">Sign Up <br></h1>
      <h3 class="">Trouvez l'amour près de chez vous en quelques clics : </h3>
    </div>
  </section>

  <div class="">
    <form action="../Controller/membersController.php" method="get">

      <section class="form-section">
        <div class="form-group">
          <label for="nom"></label>
          <input type="text" name="nom" class="form-control" placeholder="Nom" minlength="2" maxlength="30" />
        </div>

        <div class="form-group">
          <label for="prenom"></label>
          <input type="text" name="prenom" class="form-control" placeholder="Prénom" minlength="2" maxlength="30"/>
        </div>
      </section>

      <section class="form-section">
        <div class="form-group">
          <label for="date_naissance"></label>
          <input  id="naissance" type="date" name="date_naissance" class="form-control"/>
        </div>
      
        <div class="form-group">
          <label for="genre"></label>
          <select name="genre" id="genre">
            <option value="">Genre</option>
            <option value="homme" id="homme">Homme</option>
            <option value="femme" id="femme" >Femme</option>
            <option value="autre" id="autre">Autre</option>
          </select>
        </div>
      </section>

      <section class="form-section">
        <div class="form-group">
          <label for="email"></label>
          <input type="email" name="email" class="form-control" placeholder="email@" minlength="5" maxlength="30"/>
        </div>


        <div class="form-group">
          <label for="ville"></label>
          <input type="text" name="ville" class="form-control" placeholder="Ville" minlength="2" maxlength="30"/>
        </div>
      </section>


      <section class="form-section">
         <div class="form-group">
          <label for="loisir1"></label>
          <input type="text" name="loisir1" class="form-control" placeholder="Loisir 1" minlength="2" maxlength="30"/>
        </div>

        <div class="form-group">
          <label for="loisir2"></label>
          <input type="text" name="loisir2" class="form-control" placeholder="Loisir 2" minlength="2" maxlength="30"/>
        </div>
      </section>


      <section class="form-section">
        <div class="form-group">
          <label for="loisir3"></label>
          <input type="text" name="loisir3" class="form-control" placeholder="Loisir 3" minlength="2" maxlength="30"/>
        </div>
      
        <div class="form-group">
          <label for="password"></label>
          <input type="password" name="password" class="form-control" placeholder="Mot de passe" minlength="3" maxlength="40"/>
        </div>
      </section>
      

      <div class="form-group">
        <label for="password_confirm"></label>
        <input type="password" name="password_confirm" class="form-control" placeholder="Confirmer mot de passe" minlength="3" maxlength="40"/>
      </div>

    
      <div>
        <p><a id="connec" href="connection.php">Se connecter</a><p>
      </div>

      <button type="submit" id="subscrib"> S'incrire </button>

    </form>
  </div>
</div>

<?php require_once 'footer.php'; ?>

