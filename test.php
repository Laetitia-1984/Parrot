<?php 
    if (isset($_POST['sendMail'])) {
        //extraction des variables
        extract($_POST);

        //Vérifier si les variables existent et ne sont pas vides
        if (isset($name) && $name != "" && isset($firstname) && $firstname != "" && isset($email) && $email != "" && isset($content) && $content != "") {
            //Paramètres pour envoyer le mail
            $to = "vincentparrot1953@gmail.com";
            $subject = "Demande d'info sur la voiture: " . $cars;
            $message = "
                <p>Vous avez reçu un message de <strong> " . $name. ' ' . $firstname ."</strong></p>
                <p>Email : ". $email."</p>
                <p>Message : ". $content ."</p>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <'.$email.'>' . "\r\n";

            //Envoi du mail
            $sendmail = mail($to,$subject,$message,$headers);
            // Vérification de l'envoi du mail
            if($sendmail) {
                $info = "Votre message a été envoyé";
                $color = "green";
            } else {
                $info = "Votre message n'est pas envoyé";
                $color = "red";
            }
        } else {
            //Cas où elles sont vides
            $info = " Veuillez remplir tous les champs ! ";
            $color = " red ";
        }
    }
?>
<h1 class="text-center mb-3">Formulaire de contact</h1>

<?php 
    // Afficher le message d'erreur
    if(isset($info)) { ?>
        <p class="request_message" style="color:<?=$color?>"><?=$info?></p>
    <?php } ?>
<form method="POST" enctype="multipart/form-data" class="form-contact">
    <div>
        <label for="name">Votre nom</label>
        <input type="text" name="name" id="name" class="mb-2 ms-2 form-control">
    </div>
    <div>
        <label for="firstname">Votre prénom</label>
        <input type="text" name="firstname" id="firstname" class="mb-2 ms-2 form-control">
    </div>
    <div>
        <label for="email">Votre adresse mail</label>
        <input type="text" name="email" id="email" class="mb-2 ms-2 form-control">
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
        <label for="content">Votre message</label>
        <textarea name="content" id="content" cols="30" rows="3" class="form-control form-text"></textarea>
    </div>
    <input type="submit" value="Envoyer" name="sendMail" class="btn btn-outline-primary me-2 mt-3">
</form>