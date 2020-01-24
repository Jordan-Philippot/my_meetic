<?php require_once 'header.php'; ?>


<div class="container1">
<form action="profil.php" method="post" class="">

    <h1> Se connecter </h1>
    <div class="form-connect">
        <label for="email"></label>
        <input type="email" name="email" class="form-control" placeholder="Email@"/>
    </div>

    <div class="form-connect">
        <label for="password"></label>
        <input type="password" name="password" class="form-control" placeholder="Mot de passe"/>
    </div>

  
    <button type="submit" id="connexion"> Se connecter </button>

    <div id="edit_co">
        <a href="edit.php">Mot de passe oublié ?</a>
    </div>

    <div id="subscription_co">
        <a href="registration.php">S'inscrire</a>
    </div>
</form>
</div>










<?php require_once 'footer.php'; ?>