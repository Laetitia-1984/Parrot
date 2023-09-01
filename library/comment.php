<?php
function getComments(PDO $pdo, int $limit = null, int $page = null):array|bool
{
    $sql = "SELECT * FROM comment ORDER BY id DESC";

    if ($limit && !$page) {
        $sql .= " LIMIT  :limit";
    }
    if ($limit && $page) {
        $sql .= " LIMIT :offest, :limit";
    }

    $query = $pdo->prepare($sql);

    if ($limit) {
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    if ($page) {
        $offset = ($page - 1) * $limit;
        $query->bindValue(":offest", $offset, PDO::PARAM_INT);
    }

    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function saveComment (PDO $pdo, string $nameClient, int $note, string $content, int $id = null): bool {
    if ($id === null) {
        $query = $pdo->prepare("INSERT INTO comment (nameClient, note, content) ". "VALUES(:nameClient, :note, :content)");
    } else {
        $query = $pdo->prepare("UPDATE `comment` SET `nameClient` = :nameClient," . "`note` = :note," . "`content` = :content WHERE `id` = :id;");
        
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
    }

    $query->bindValue(':nameClient', $nameClient, PDO::PARAM_STR);
    $query->bindValue(':note', $note, PDO::PARAM_INT);
    $query->bindValue(':content', $content, PDO::PARAM_STR);
    return $query->execute();
}

function getCommentById (PDO $pdo, int $id):array|bool {
    $query = $pdo->prepare("SELECT * FROM comment WHERE id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

function getTotalComments (PDO $pdo):int|bool { //Compte le nombre de ligne dans la table service
    $sql = "SELECT COUNT(*) as total FROM comment";
    $query = $pdo->prepare($sql);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

function deleteComment(PDO $pdo, int $id):bool {
    $query = $pdo->prepare("DELETE FROM comment WHERE id = :id");
    $query->bindValue(':id', $id, $pdo::PARAM_INT);

    $query->execute();
    if($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}