<?php
    require_once('library/config.php');
    require_once('library/pdo.php');
    require_once('library/session.php');
    $currentPage = basename($_SERVER['SCRIPT_NAME']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="voitures, garages, occasions"/>
    <meta name="description" content="Un garage au service de votre voiture."/>
    <title>Garage Parrot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/override-bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img src="assets/images/Logo.png" alt="logo-garage" width="250">
                </a>
            </div>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav nav-pills">
                <?php
                    foreach ($mainMenu as $key => $value) {?>
                        <li class="nav-item"><a href="<?=$key; ?>" class="nav-link <?php if ($currentPage === $key) { echo 'active';} ?>"><?=$value;?></a></li>
                <?php } ?>
            </ul>
            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href = 'login.php';">Connexion</button>
            </div>
        </header>