<?php

function getOccasionImage(string|null $image) { //La barre verticale permet de proposer en type soit string soit null
    if ($image === null) {
        return _ASSETS_IMG_PATH_.'Logo.png';
    } else {
        return _OCCASIONS_IMG_PATH_.$image;
    }
}

function getOccasions(PDO $pdo, int $limit = null) {
    $sql = 'SELECT * FROM cars ORDER BY id DESC'; //Requete SQL classée du plus grand ID au plus petit
    
    //On parametre la limoite d'affichage du nombre de recettes sur la page d'accueil
    if($limit) {
        $sql .= ' LIMIT :limit';
    }

    $query = $pdo->prepare($sql); // On prepare la requete et on la stocke dans une variable ($query)
    
    if ($limit) {
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    }
    $query->execute(); // On execute la requete
    return $query->fetchAll();
}

