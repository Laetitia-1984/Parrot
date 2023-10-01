<?php 
    require_once('../library/config.php');
    require_once('../library/session.php');
    adminOnly();
    
    require_once('templates/header.php');
    require_once('../library/pdo.php');
    require_once('../library/user.php');
    require_once('../library/tools.php');

    $errors = [];
    $messages = [];
    $profil = [
        'name' => '',
        'firstname' => '',
        'email' => '',
        'password' => '',
        'role' => '',
    ];

    if (isset($_GET['id'])) {
        $profil = getProfilById($pdo, $_GET['id']);
        if ($profil === false) {
            $errors[] = "L'article n'existe pas";
        }
        $pageTitle = "Formulaire modification profil";
    } else {
        $pageTitle = "Formulaire ajout profil";
    }

    if (isset($_POST['saveProfil'])) { //Affichage du formulaire si il est plein sinon rien
        $profil = [
            'name' => $_POST['name'],
            'firstname' => $_POST['firstname'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'role' => $_POST['role'],
        ];
        // S'il n' y a pas d'erreur, on sauvegarde
        if (!$errors) {
            if (isset($_GET["id"])) {
                $id = (int)$_GET["id"];
            } else {
                $id = null;
            }
            //On passe toutes les données à la fonction getService
            $res = saveProfil($pdo, $_POST['name'], $_POST['firstname'], $_POST['email'], $_POST['password'], $_POST['role']);
        
            if ($res) {
                $messages[] = 'Le profil a bien été sauvegardé';
                //On vide le tableau pour avoir les champs du formulaire vides
                if (!isset($_GET["id"])) {
                    $profil = [
                        'name' => '',
                        'firstname' => '',
                        'email' => '',
                        'password' => '',
                        'role' => ''
                    ];
                }
            } else {
                $errors[] = 'Le profil n\'a pas été sauvegardé';
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

<?php if ($profil !== false) { ?>

<!--Formulaire ajout de services -->
<form method="POST" enctype="multipart/form-data" class="form_service">
    <div class="mb-3">
        <label for="name">Nom du salarié</label>
        <input type="text" name="name" id="name" class="form-control form-text" value="<?= $profil['name']; ?>"></>
    </div>
    <div class="mb-3">
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname" cols="30" rows="5" class="form-control form-text" value="<?= $profil['firstname']; ?>"></>
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" cols="30" rows="5" class="form-control form-text" value="<?= $profil['email']; ?>"></>
    </div>
    <div class="mb-3">
        <label for="password">Mot de passe</label>
        <input name="password" id="password" cols="30" rows="5" class="form-control form-text" value="<?= $profil['password']; ?>"></>
    </div>
    <div class="mb-3">
        <label for="role">Role</label>
        <input name="role" id="role" cols="30" rows="5" class="form-control form-text" value="<?= $profil['role']; ?>"></>
    </div>
    <input type="submit" value="Envoyer" name="saveProfil" class="btn btn-outline-primary me-2">
</form>
<?php } ?>

<?php 
    require_once('templates/footer.php')
?>