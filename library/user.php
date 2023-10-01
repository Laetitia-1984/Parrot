<?php 
function verifyUserLoginPassword(PDO $pdo, string $email, string $password):array|bool {
    $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        return $user;
    } else {
        return false;
    }
}
function getProfilById(PDO $pdo, int $id):array|bool {
    $query = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

function saveProfil(PDO $pdo, string $name, string $firstname, string $email, string $password, $role) {
    $sql = "INSERT INTO `users` (`id`, `name`, `firstname`, `email`, `password`, `role`) VALUES (NULL, :name, :firstname, :email, :password, :role)";
    $query = $pdo->prepare($sql); // On prepare la requete et on la stocke dans une variable ($query)
    
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':role', $role, PDO::PARAM_STR);
    return $query->execute();
}

function getProfils(PDO $pdo, int $limit = null, int $page = null ):array
{
    $sql = "SELECT * FROM users ORDER BY id DESC";
    if ($limit && !$page) {
        $sql .= " LIMIT :limit";
    }
    if ($page) {
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
    $profils = $query->fetchAll(PDO::FETCH_ASSOC);

    return $profils;
}

function deleteProfil(PDO $pdo, int $id):bool {
    $query = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $query->bindValue(':id', $id, $pdo::PARAM_INT);

    $query->execute();
    if($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

function getTotalProfils (PDO $pdo):int|bool { //Compte le nombre de ligne dans la table service
    $sql = "SELECT COUNT(*) as total FROM users";
    $query = $pdo->prepare($sql);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}