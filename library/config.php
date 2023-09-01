<?php
    define('_ASSETS_IMG_PATH_', 'assets/images/');
    define('_OCCASIONS_IMG_PATH_', 'uploads/occasions/');
    define('_HOME_COMMENT_LIMIT_', 4);
    define('_DOMAIN_', 'localhost');
    define('_ADMIN_SERVICES_PER_PAGE_', 10);
    define('_AJOUT_IMG_OCCASION_PATH_', '../uploads/occasions/');

    $mainMenu = [
        'index.php' => 'Accueil',
        'services.php' => 'Nos services',
        'occasions.php' => 'Occasions',
    ];

    $cats = [
        'cat1' => 'Vidange et révision',
        'cat2' => 'Entretien et réparation',
    ];

    $notes = [
        'note5' => '5',
        'note4' => '4',
        'note3' => '3',
        'note2' => '2',
        'note1' => '1',
        'note0' => '0',
    ];

    $adminMenu = [
        'index.php' => 'Accueil',
        'profil.php' => 'Profil',
        'services.php' => 'Services',
        'horaires.php' => 'Horaires',
    ];

    $userMenu = [
        'index.php' => 'Accueil',
        'occasions.php' => 'Annonces',
        'comments.php' => 'Commentaires',
    ];

    $jours = [
        'jour1' => 'Lundi',
        'jour2' => 'Mardi',
        'jour3' => 'Mercredi',
        'jour4' => 'Jeudi',
        'jour5' => 'Vendredi',
        'jour6' => 'Samedi',
        'jour7' => 'Dimanche',
    ];
    
    $hours_mat = [
        'hrs_debut_matin1' => '8h-12h',
        'hrs_debut_matin2' => '8h30-12H',
        'hrs_debut_matin3' => '9h-12h',
        'close' => 'Fermé',
    ];

    $hours_apm = [
        'hrs_fin_aprem1' => '14-17h',
        'hrs_fin_aprem2' => '14h-17h30',
        'hrs_fin_aprem3' => '14h-18h',
        'close' => 'Fermé',
    ];