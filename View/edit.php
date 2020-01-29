<?php require_once 'header.php';?>

<div class="container_edit">
    <form action="../Controller/editController.php" method="get">

        <h1> Modifier votre profil </h1>
        <div class="form-edit">
            <input type="email" name="email_modif" class="form-control" placeholder="Modifier votre email"/>
        </div>

        <div class="form-edit">
            <input type="password" name="password_modif" class="form-control" placeholder="Modifier votre Mot de passe"/>
        </div>

        <!--<div class="form-edit">
            <input type="password" name="password_modif_confirm" class="form-control" placeholder="Confirmer votre nouveau Mot de passe"/>
        </div>-->
    
        <button type="submit" class="connexion"> Modifier </button>

        <input type="submit" class="delete" value="Désactiver votre compte" name="delete"></input>

        <div class="disconnect_flex">
            <div class="edit_search">
                <a href="search.php"> Rechercher membres </a>
            </div>

            <div class="edit_profil">
                <a href="profil.php"> Profil </a>
            </div>
        </div>
    </form>   
</div>
<?php if(!empty($_SESSION['error_edit'])):?>
    <div class="alert-danger_co">
        <p>Vous n'avez pas rempli le formulaire correctement : </p>
        <ul>
            <?php $error_session_edit = $_SESSION['error_edit'];
            foreach($error_session_edit as $errors_edit): ?>
                <li> <?= $errors_edit ?> </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; 

require_once 'footer.php';