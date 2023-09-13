<?php 
    require_once('templates/header.php');
    require_once('library/occasion.php');
    require_once('library/config.php');
    require_once('library/pdo.php');

    $occasions = getOccasions($pdo);

    if (!empty($_POST)) {
        $destinataire = 'vincentparrot1953@gmail.com';
        $expediteur = $_POST['email'];
        $objet = $_POST['cars'];
        $headers = "Content-Type: text/plain; charset=utf-8\r\n";
        $headers .= 'From: <'.$_POST['name']. ' ' .$_POST['firstname'].'>'."\n";
        $message = $_POST['message'];

        if (mail($destinataire, $objet, $message, $headers)) {
            echo 'Votre message a bien été envoye';
        } else {
            echo 'Votre message n\'a pas été envoyé';
        }
    }
?>
<h1 class="text-center mb-3">Formulaire de contact</h1>

<form method="POST" enctype="multipart/form-data" class="form-contact">
    <div>
        <label for="name">Votre nom</label>
        <input type="text" name="name" id="name" class="mb-2 ms-2 form-control" required>
    </div>
    <div>
        <label for="firstname">Votre prénom</label>
        <input type="text" name="firstname" id="firstname" class="mb-2 ms-2 form-control" required>
    </div>
    <div>
        <label for="email">Votre adresse mail</label>
        <input type="text" name="email" id="email" class="mb-2 ms-2 form-control" required>
    </div>
    <div>
        <label for="cars">Sélectionnez la voiture</label>
            <select name="cars" id="cars" class="mb-2 ms-2 form-select list-cars">
                <?php foreach ($occasions as $occasion) { ?>
                    <option value="<?=$occasion['mark']. ' ' .$occasion['model'] ?>"><?=$occasion['mark']. ' ' .$occasion['model']; ?></option>
                <?php } ?>
            </select>
    </div>
    <div>
        <label for="message">Votre message</label>
        <textarea name="message" id="message" cols="30" rows="3" class="form-control form-text" required></textarea>
    </div>
    <input type="submit" value="Envoyer" name="sendMail" class="btn btn-outline-primary me-2 mt-3">
</form>

<?php 
    require_once('templates/footer.php');
?>