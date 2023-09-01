<?php 
function getServiceById(PDO $pdo, int $id) {
    //Mise en place des parametres de securite pour la connexion vers la bdd
    $query = $pdo->prepare("SELECT * FROM services WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT); // code permettant de sécuriser la requete
    $query->execute();
    return $query->fetch();
}
function getServices(PDO $pdo, int $limit = null, int $page = null ):array|bool
{
    $sql = "SELECT * FROM services ORDER BY id DESC";
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

function getTotalServices (PDO $pdo):int|bool { //Compte le nombre de ligne dans la table service
    $sql = "SELECT COUNT(*) as total FROM services";
    $query = $pdo->prepare($sql);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

function saveService(PDO $pdo, string $category, string $title, string $description, int $price, int $id = null): bool {
    if ($id === null) {
        $query = $pdo->prepare("INSERT INTO services (category, title, description, price) ". "VALUES(:category, :title, :description, :price)");
    } else {
        $query =$pdo->prepare("UPDATE `services` SET `category` = :category," . "`title` = :title," . "`description` = :description," . "`price` = :price WHERE `id` = :id;");
        
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
    }

    $query->bindValue(':category', $category, PDO::PARAM_STR);
    $query->bindValue(':title', $title, PDO::PARAM_STR);
    $query->bindValue(':description', $description, PDO::PARAM_STR);
    $query->bindValue(':price', $price, PDO::PARAM_INT);
    return $query->execute();
}

function deleteService(PDO $pdo, int $id):bool {
    $query = $pdo->prepare("DELETE FROM services WHERE id = :id");
    $query->bindValue(':id', $id, $pdo::PARAM_INT);

    $query->execute();
    if($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}