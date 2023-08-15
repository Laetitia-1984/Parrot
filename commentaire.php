<?php 
    require_once('templates/header.php');
    require_once('library/config.php');
    require_once('library/comment.php');

    //Tableau des messages d'erreur ou de reussite d'ajout de recette
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
                $messages[] = 'La recette a bien été sauvegardée';
            } else {
                $errors[] = 'La recette n\'a pas été sauvegardée';
            }
        }
        $comment = [
            'nameClient' => $_POST['nameClient'],
            'note' => $_POST['note'],
            'content' => $_POST['content'],
        ];
    }
?>

<!--Formulaire ajout de recette -->
<form method="POST" enctype="multipart/form-data" class="form_comment">
    <div class="mb-3">
        <label for="nameClient">Pseudo</label>
        <input type="text" name="nameClient" id="nameClient" class="form-control" value="<?=$comment['nameClient']?>">
    </div>
    <div class="mb-3">
        <label for="note">Note</label>
        <input type="text" name="note" id="note" class="form-control"><?=$comment['note'];?></textarea>
    </div>
    <div class="mb-3">
        <label for="content">Commentaire</label>
        <textarea name="content" id="content" cols="30" rows="5" class="form-control"><?=$comment['content'];?></textarea>
    </div>
    <input type="submit" value="Envoyer" name="saveComment" class="btn btn-outline-primary me-2">
</form>