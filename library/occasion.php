<?php

function getOccasionImage(string|null $image) { //La barre verticale permet de proposer en type soit string soit null
    if ($image === null) {
        return _ASSETS_IMG_PATH_.'Logo.png';
    } else {
        return _OCCASIONS_IMG_PATH_.$image;
    }
}

function getOccasions(PDO $pdo, int $limit = null, int $page = null ):array|bool
{
    $sql = "SELECT * FROM cars ORDER BY id DESC";
    if ($limit && !$page) {
        $sql .= " LIMIT :limit";
    }
    if ($limit && $page) {
        $sql .= " LIMIT :offset, :limit";
    }

    $query = $pdo->prepare($sql);

    if ($limit) {
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    if ($page) {
        $offset = ($page -1) * $limit;
        $query->bindValue(":offset", $offset, PDO::PARAM_INT);
    }

    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getOccasionById(PDO $pdo, int $id):array|bool {
    $query = $pdo->prepare("SELECT * FROM cars WHERE id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

function getTotalOccasions (PDO $pdo):int|bool { //Compte le nombre de ligne dans la table service
    $sql = "SELECT COUNT(*) as total FROM cars";
    $query = $pdo->prepare($sql);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

function saveOccasion(PDO $pdo, string $mark, string $model, int $year, int $km, int $price, string $description, string|null $image, string|null $image2, string|null $image3, string|null $image4, int $id = null): bool {
    if ($id === null) {
        $query = $pdo->prepare("INSERT INTO cars (mark, model, year, km, price, description, image, image2, image3, image4) "."VALUES(:mark, :model, :year, :km, :price, :description, :image, :image2, :image3, :image4)");
    } else {
        $query = $pdo->prepare("UPDATE `cars` SET `mark` = :mark," . "`model` = :model," . "`year` = :year," . "`km` = :km," . "`price` = :price," . "`description` = :description," . "`image` = :image," . "`image2` = :image2," . "`image3` = :image3," . "`image4` = :image4 WHERE `id` = :id;");
        
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
    }

    $query->bindValue(':mark', $mark, PDO::PARAM_STR);
    $query->bindValue(':model', $model, PDO::PARAM_STR);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':km', $km, PDO::PARAM_INT);
    $query->bindValue(':price', $price, PDO::PARAM_INT);
    $query->bindValue(':description', $description, PDO::PARAM_STR);
    $query->bindValue(':image', $image, $pdo::PARAM_STR);
    $query->bindValue(':image2', $image2, $pdo::PARAM_STR);
    $query->bindValue(':image3', $image3, $pdo::PARAM_STR);
    $query->bindValue(':image4', $image4, $pdo::PARAM_STR);
    return $query->execute();
}

function deleteOccasion(PDO $pdo, int $id):bool {
    $query = $pdo->prepare("DELETE FROM cars WHERE id = :id");
    $query->bindValue(':id', $id, $pdo::PARAM_INT);

    $query->execute();
    if($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}





