<?php require_once 'header.php'; ?>
    <div class="container_index">
        <h1> Bienvenue sur my meetic </h1>
         <?php if(isset($_SESSION['auth'])):?>
            <input type="button" class="confirm_connect" onclick="toggle_index()" value="L'amour à porté de clics"></input>
        <?php else:
            header('Location: index.php');
        endif; ?>
        <div id="toggle_index">
            <button type="button" class="subscrib_index"><a href="profil.php"> Mon profil </a></button>
            <button type="button" class="connexion_index"><a href="search.php"> Rechercher des membres </a></button>
        </div>
    </div>
       <?php
        if(!empty($_SESSION['success_co'])): ?>
        <div class="alert-succes_co">
        <ul>
        <?php $success_session_co = $_SESSION['success_co'];
        foreach($success_session_co as $success_co): ?>
            <li> <?= $success_co ?> </li>
        <?php endforeach; ?>
            </ul>
        </div>
        <?php endif;?>
<?php require_once 'footer.php'; 

