<?php 

function saveHours (PDO $pdo, string $days, string $hrsMat, string $hrsApm, int $id = null): bool {
    if ($id === null) {
        $query = $pdo->prepare("INSERT INTO horaires (days, hrsMat, hrsApm) ". "VALUES(:days, :hrsMat, :hrsApm)");
    } else {
        $query = $pdo->prepare("UPDATE `horaires` SET `days` = :days," . "`hrsMat` = :hrsMat," . "`hrsApm` = :hrsApm WHERE `id` = :id;");
        
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
    }

    $query->bindValue(':days', $days, PDO::PARAM_STR);
    $query->bindValue(':hrsMat', $hrsMat, PDO::PARAM_STR);
    $query->bindValue(':hrsApm', $hrsApm, PDO::PARAM_STR);
    return $query->execute();
}

function getHours(PDO $pdo)
{
    $sql = "SELECT * FROM horaires";
    $query = $pdo->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getHourById(PDO $pdo, int $id) {
    //Mise en place des parametres de securite pour la connexion vers la bdd
    $query = $pdo->prepare("SELECT * FROM horaires WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT); // code permettant de sécuriser la requete
    $query->execute();
    return $query->fetch();
}

function deleteHour(PDO $pdo, int $id):bool {
    $query = $pdo->prepare("DELETE FROM horaires WHERE id = :id");
    $query->bindValue(':id', $id, $pdo::PARAM_INT);

    $query->execute();
    if($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}