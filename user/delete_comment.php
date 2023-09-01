<?php 
    require_once('../library/config.php');
    require_once('../library/session.php');
    
    require_once('templates/header.php');
    require_once('../library/pdo.php');
    require_once('../library/comment.php');
    require_once('../library/tools.php');

    $comment = false;
    $errors = [];
    $messages = [];
    if (isset($_GET["id"])) {
        $comment = getCommentById($pdo, (int)$_GET["id"]);
    }
    if ($comment) {
        if(deleteComment($pdo, (int)$_GET["id"])) {
            $messages[] = "Le commentaire a bien été supprimé";
        } else {
            $errors[] = "Une erreur s'est produite lors de la suppression";
        }
    } else {
        $errors[] = "Le commentaire n'existe pas";
    }
?>

<div class="row text-center my-5">
    <h1>Suppression commentaire</h1>
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