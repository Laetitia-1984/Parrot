<?php 
    require_once('library/config.php');
    require_once('library/user.php');
    require_once('templates/header.php');
    $errors = [];
    //Vérification que le formulaire a bien été envoyé
    if (isset($_POST["loginUser"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = verifyUserLoginPassword($pdo, $email, $password);
        if ($user) {
            session_regenerate_id(true);
            $_SESSION['user'] = $user; //Session qui permet de garder en mémoire qui est connecté
            if ($user['role'] === 'user') {
                header('location: user/index.php'); // Redirection si l'user est un salarié
            } elseif ($user['role'] === 'null') {
                header('location: user/index.php');
            } elseif ($user['role'] === 'admin') {
                header('location: admin/index.php'); // Redirection si l'user est un admin
            }
        } else {
            $errors[] = "Email ou mot de passe incorrect";
        }
    }
?>

<h1>Connexion</h1>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger">
        <?=$error; ?>
    </div>
<?php } ?>

<form method="post" class="formUser">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control form-text">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control form-text">
    </div>
    <input type="submit" value="Connexion" name="loginUser" class="btn btn-outline-primary me-2">
</form>


<?php
    require_once('templates/footer.php');

?>