<?php 
    require_once('../library/config.php');
    require_once('../library/session.php');
    
    require_once('templates/header.php');
    require_once('../library/pdo.php');
    require_once('../library/comment.php');
    require_once('../library/tools.php');

    $errors = [];
    $messages = [];
    $comment = [
        'nameClient' => '',
        'note' => '',
        'content' => ''
    ];

    if (isset($_GET['id'])) {
        $comment = getCommentById($pdo, $_GET['id']);
        if ($comment === false) {
            $errors[] = "Le commentaire n'existe pas";
        }
        $pageTitle = "Formulaire modification commentaire";
    } else {
        $pageTitle = "Formulaire ajout commentaire";
    }

    if (isset($_POST['saveComment'])) { //Affichage du formulaire si il est plein sinon rien
        $comment = [
            'nameClient' => $_POST['nameClient'],
            'note' => $_POST['note'],
            'content' => $_POST['content'],
        ];
        // S'il n' y a pas d'erreur, on sauvegarde
        if (!$errors) {
            if (isset($_GET["id"])) {
                $id = (int)$_GET["id"];
            } else {
                $id = null;
            }
            //On passe toutes les données à la fonction getService
            $res = saveComment($pdo, $_POST['nameClient'], $_POST['note'], $_POST['content'], $id);
        
            if ($res) {
                $messages[] = "Le commentaire a bien été sauvegardé";
                //On vide le tableau pour avoir les champs du formulaire vides
                if (!isset($_GET["id"])) {
                    $comment = [
                        'nameClient' => '',
                        'note' => '',
                        'content' => '',
                    ];
                }
            } else {
                $errors[] = "Le commentaire n'a pas été sauvegardé";
            }
        }
    }
?>
<h1><?= $pageTitle; ?></h1>

<?php foreach ($messages as $message) { ?> <!-- Parcours du tableau des messages -->
    <div class="alert alert-success">
        <?=$message; ?>
    </div>
<?php } ?>

<?php foreach ($errors as $error) { ?> <!-- Parcours du tableau des messages -->
    <div class="alert alert-danger">
        <?=$error; ?>
    </div>
<?php } ?>

<?php if ($comment !== false) { ?>

<!--Formulaire ajout de services -->
<form method="POST" enctype="multipart/form-data" class="form_comment">
    <div class="mb-3">
        <label for="nameClient">Pseudo</label>
        <input type="text" name="nameClient" id="nameClient" class="form-control form-text" value="<?= $comment['nameClient']; ?>"></>
    </div>
    <div class="mb-3">
        <label for="note">Note</label>
        <select name="note" id="note" class="form-select list-note">
            <?php foreach ($notes as $note) { ?>
                <option value="<?=$note; ?>"><?=$note; ?> étoiles</option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="content">Commentaire</label>
        <textarea name="content" id="content" cols="30" rows="3" class="form-control form-text"><?=$comment['content'];?></textarea>
    </div>

    <input type="submit" value="Envoyer" name="saveComment" class="btn btn-outline-primary me-2">
</form>
<?php } ?>

<?php 
    require_once('templates/footer.php')
?>