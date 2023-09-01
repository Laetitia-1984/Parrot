<?php 
    require_once('../library/config.php');
    require_once('../library/session.php');
    require_once('../library/pdo.php');
    
    $currentPage = basename($_SERVER['SCRIPT_NAME']);
        
    adminOnly();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/override-bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Accueil - Admin</title>
</head>
<body>

<div class="container d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 200px;">
        <span class="fs-4 text_center">Menu Administrateur</span>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item menu-admin text-bg-dark">
                <?php
                    foreach ($adminMenu as $key => $value) {?>
                        <li class="nav-item"><a href="<?=$key; ?>" class="nav-link menu-admin <?php if ($currentPage === $key) { echo 'active';} ?>"><?=$value;?></a></li>
                <?php } ?>
            </li>
        </ul>
        <hr>
        <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href = '../logout.php';">Déconnexion</button>
    </div>

    <main class="d-flex flex-column px-4" style="width: 1000px;">

    <h1 class="text-center">Admin - Tableau de bord</h1>