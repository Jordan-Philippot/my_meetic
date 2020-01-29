<?php require_once 'header.php';
if(!isset($_SESSION['auth'])):
    header('Location: index.php');
endif; ?>

    <div class="container_search">
        <h1> Les célibataires près de chez vous</h1>
       
        <form action="../Controller/searchController.php" method="get">

            <button type="submit" class="search_button">Rechercher</button>

            <div class="disconnect_flex">
                <p><a class="disconnect" href="index.php">Se déconnecter</a><p>
                <p><a class="disconnect" href="profil.php">Mon profil</a><p>
            </div>
        </form>
    </div>
<?php require_once 'footer.php'; 
