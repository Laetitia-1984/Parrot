<?php 
    require_once('../library/config.php');
    require_once('../library/session.php');
    
    require_once('templates/header.php');
    require_once('../library/pdo.php');
    require_once('../library/occasion.php');
    require_once('../library/tools.php');

    $occasion = false;
    $errors = [];
    $messages = [];
    if (isset($_GET["id"])) {
        $occasion = getOccasionById($pdo, (int)$_GET["id"]);
    }
    if ($occasion) {
        if(deleteOccasion($pdo, (int)$_GET["id"])) {
            $messages[] = "L'annonce' a bien été supprimée";
        } else {
            $errors[] = "Une erreur s'est produite lors de la suppression";
        }
    } else {
        $errors[] = "L'annonce n'existe pas";
    }
?>

<div class="row text-center my-5">
    <h1>Suppression annonce</h1>
    <?php foreach ($messages as $message) { ?>
        <div class="alert alert-success" role="alert">
            <?= $message; ?>
        </div>
    <?php } ?>
    
    <?php foreach ($errors as $error) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $error; ?>
        </div>
    <?php } ?>
</div>

<?php
    require_once('templates/footer.php');
?>