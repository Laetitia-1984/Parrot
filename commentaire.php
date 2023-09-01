<?php 
    require_once('templates/header.php');
    require_once('library/config.php');
    require_once('library/comment.php');

    //Tableau des messages d'erreur ou de reussite d'ajout de commentaire
    $errors = [];
    $messages = [];
    $comment = [
        'nameClient' => '',
        'note' => '',
        'content' => '',
    ];

    if (isset($_POST['saveComment'])) { //Affichage du formulaire si il est plein sinon rien
        if (!$errors) {
            $res = saveComment($pdo, $_POST['nameClient'], $_POST['note'], $_POST['content']);
        
            if ($res) {
                $messages[] = 'Le commentaire a bien été sauvegardé';
            } else {
                $errors[] = 'Le commentaire n\'a pas été sauvegardé';
            }
        }
        $comment = [
            'nameClient' => $_POST['nameClient'],
            'note' => $_POST['note'],
            'content' => $_POST['content'],
        ];
    }
?>

<!--Formulaire ajout de commentaire -->
<form method="POST" enctype="multipart/form-data" class="form_comment">
    <div class="mb-3">
        <label for="nameClient">Pseudo</label>
        <input type="text" name="nameClient" id="nameClient" class="form-control form-text" maxlength="10" value="<?=$comment['nameClient']?>">
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
    <input type="submit" value="Envoyer" name="saveComment" onclick="window.location.href = 'index.php';" class="btn btn-outline-primary me-2">
    <a href="index.php">Retour à l'accueil</a>
</form>