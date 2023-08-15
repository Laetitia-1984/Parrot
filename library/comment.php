<?php
function getComment(PDO $pdo, int $limit = null) {
        $sql = 'SELECT * FROM comment ORDER BY id DESC'; //Requete SQL classée du plus grand ID au plus petit
        
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

function saveComment(PDO $pdo, string $nameClient, int $note, string $content) {
    $sql = "INSERT INTO `comment` (`id`, `nameClient`, `note`, `content`) VALUES (NULL, :nameClient, :note, :content)";
    $query = $pdo->prepare($sql); // On prepare la requete et on la stocke dans une variable ($query)
    $query->bindParam(':nameClient', $nameClient, PDO::PARAM_STR);
    $query->bindParam(':note', $note, PDO::PARAM_STR);
    $query->bindParam(':content', $content, PDO::PARAM_STR);
    return $query->execute();
}