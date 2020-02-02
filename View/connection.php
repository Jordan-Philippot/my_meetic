<?php require_once 'header.php'; ?>
<div class="container1">
    <form action="../Controller/connectionController.php" method="POST">
        <h1> Se connecter </h1>
        
        <div class="form-connect">
            <input type="email" name="email" class="form-control" placeholder="Email@"/>
        </div>

        <div class="form-connect">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe"/>
        </div>
    
        <button type="submit" class="connexion"> Se connecter </button>

        <div class="disconnect_flex">
            <div class="edit_co">
                <a href="edit.php"> Mot de passe oublié ?</a>
            </div>

            <div class="subscription_co">
                <a href="registration.php"> S'inscrire </a>
            </div>
        </div>
    </form>
</div>

<?php if(!empty($_SESSION['error_connect']) && isset($_SESSION['auth']) && empty($_SESSION['delete_edit'])):?>
    <div class="alert-danger_co">
        <p>Vous n'avez pas rempli le formulaire correctement : </p>
        <ul>
            <?php $error_session_co = $_SESSION['error_connect'];
            foreach($error_session_co as $errors_co): ?>
                <li> <?= $errors_co ?> </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; 

if(!empty($_SESSION['success_signup']) && empty($_SESSION['delete_edit'])): ?>
    <div class="alert-succes_co">
        <ul>
            <?php $success_session_signup = $_SESSION['success_signup'];
            foreach($success_session_signup as $success_signup): ?>
                <li> <?= $success_signup ?> </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif;

if(!empty($_SESSION['delete_edit'])):?>
    <div class="alert-succes_co">
        <?php $delete_edit = $_SESSION['delete_edit']; ?>
        <?= $delete_edit ?>
    </div>
<?php endif; 

if(!empty($_SESSION['inactive'])):?>
    <div class="alert-danger_co">
        <ul>
            <?php $inactive = $_SESSION['inactive'];
            foreach($inactive as $inactiv): ?>
                <li> <?= $inactiv ?> </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; 
       
require_once 'footer.php'; ?>