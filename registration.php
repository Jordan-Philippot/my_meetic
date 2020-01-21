<?php require_once 'header.php';
      require_once 'post.php';?>
<!--___________________________________________________ VIEW_____________________________________-->



<div class="container">

  <section class="">
    <div class="">
      <h1 class="">Sign Up <br></h1>
      <h3 class="">Trouvez l'amour près de chez vous en quelques clics : </h3>
    </div>

  </section>

  <div class="">
    <form action="post.php" method="post" class="">

      <section class="form-section">
        <div class="form-group">
          <label for="nom"></label>
          <input type="text" name="nom" class="form-control" placeholder="Nom" />
        </div>

        <div class="form-group">
          <label for="prenom"></label>
          <input type="text" name="prenom" class="form-control" placeholder="Prénom" />
        </div>
      </section>

      <section class="form-section">
        <div class="form-group">
          <label id="naissance" for="date_naissance"></label>
          <input type="date" name="date_naissance" class="form-control"/>
        </div>
      
        <div class="form-group">
          <label for="genre"></label>
          <select name="genre" id="genre">
            <option value="">Genre</option>
            <option value="homme" id="homme">Homme</option>
            <option value="#femme" id="femme" >Femme</option>
            <option value="autre" id="autre">Autre</option>
          </select>
        </div>
      </section>

      <section class="form-section">
        <div class="form-group">
          <label for="email"></label>
          <input type="email" name="email" class="form-control" placeholder="email@"/>
        </div>

        <div class="form-group">
          <label for="loisir"></label>
          <input list="ville_liste" id="votreville" name="ville" placeholder="Ville"/>
          <datalist id="ville_liste">
            <option value="Angers" id="1">
            <option value="Bordeaux" id="2">
            <option value="Dijon" id="3">
            <option value="Grenoble" id="4">
            <option value="Lille" id="5">
            <option value="Limoges" id="6">
            <option value="Lyon" id="7">
            <option value="Marseille" id="8">
            <option value="Montpellier" id="9">
            <option value="Nantes" id="10">
            <option value="Nice" id="11">
            <option value="Paris" id="12">
            <option value="Rennes" id="13">
            <option value="Strasbourg" id="14">
            <option value="Toulon" id="15">
          </datalist>
        </div>
      </section>


      <section class="form-section">
        <label for="loisir1"></label>
        <select name="loisir1" id="loisir1">
          <option value="">Loisir </option>
          <option value="art" id="art">Art</option>
          <option value="bien_etre" id="bien_etre" >Bien être</option>
          <option value="bricolage" id="bricolage">Bricolage</option>
          <option value="culture" id="culture">Culture</option>
          <option value="danse" id="danse" >Danse</option>
          <option value="film" id="film">Film</option>
          <option value="gastronomie" id="gastronomie">Gastronomie</option>
          <option value="informatique" id="informatique" >Informatique</option>
          <option value="meditation" id="meditation">Méditation</option>
          <option value="musique" id="musique">Musique</option>
          <option value="sport" id="sport" >Sport</option>
          <option value="voyage" id="voyage">Voyage</option>
        </select>

        <label for="loisir2"></label>
        <select name="loisir2" id="loisir2">
          <option value="">Loisir 2</option>
          <option value="art" id="art">Art</option>
          <option value="bien_etre" id="bien_etre" >Bien être</option>
          <option value="bricolage" id="bricolage">Bricolage</option>
          <option value="culture" id="culture">Culture</option>
          <option value="danse" id="danse" >Danse</option>
          <option value="film" id="film">Film</option>
          <option value="gastronomie" id="gastronomie">Gastronomie</option>
          <option value="informatique" id="informatique" >Informatique</option>
          <option value="meditation" id="meditation">Méditation</option>
          <option value="musique" id="musique">Musique</option>
          <option value="sport" id="sport" >Sport</option>
          <option value="voyage" id="voyage">Voyage</option>
        </select>
      </section>

        <label for="loisir3"></label>
        <select name="loisir3" id="loisir3">
          <option value="">Loisir 3</option>
          <option value="art" id="art">Art</option>
          <option value="bien_etre" id="bien_etre" >Bien être</option>
          <option value="bricolage" id="bricolage">Bricolage</option>
          <option value="culture" id="culture">Culture</option>
          <option value="danse" id="danse" >Danse</option>
          <option value="film" id="film">Film</option>
          <option value="gastronomie" id="gastronomie">Gastronomie</option>
          <option value="informatique" id="informatique" >Informatique</option>
          <option value="meditation" id="meditation">Méditation</option>
          <option value="musique" id="musique">Musique</option>
          <option value="sport" id="sport" >Sport</option>
          <option value="voyage" id="voyage">Voyage</option>
        </select>
    

      <div class="form-group">
        <label for="password"></label>
        <input type="password" name="password" class="form-control" placeholder="Mot de passe"/>
      </div>

      <div class="form-group">
        <label for="password_confirm"></label>
        <input type="password" name="password_confirm" class="form-control" placeholder="Confirmez" />
      </div>
    
      <div>
        <p><a id="connec" href="connection.php">Se connecter</a><p>
      </div>

      <button type="submit" id="subscrib"> S'incrire </button>

    </form>
  </div>
</div>

<?php require_once 'footer.php'; ?>

