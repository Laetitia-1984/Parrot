<?php 

require_once('library/config.php');
require_once('library/pdo.php');

//Récupere les valeurs des listes déroulantes

$priceMin = isset($_POST['priceMin']) ? $_POST['priceMin'] : null;
$priceMax = isset($_POST['priceMax']) ? $_POST['priceMax'] : null;
$kms_range = isset($_POST['km']) ? $_POST['km'] : null;
$year_range = isset($_POST['year']) ? $_POST['year'] : null;

// Construction de la requete sql
$sql = "SELECT id, mark, model, year, km, price, image FROM cars WHERE price BETWEEN :priceMin AND :priceMax";

// Ajout des clauses WHERE supplémentaires en fonction des filtre sélectionnés

if (!empty($kms_range)) {
    switch ($kms_range) {
        case '0-50000' :
            $sql .= " OR km <= 50000";
            break;
        case '50000-100000' :
            $sql .= " OR km BETWEEN 50000 AND 100000";
            break;
        case '100000-plus' :
            $sql .= " OR km > 100000";
            break;
    }
}

if (!empty($year_range)) {
    switch ($year_range) {
        case '1990-2000' :
            $sql .= " OR year <= 2000";
            break;
        case '2000-2010' :
            $sql .= " OR year BETWEEN 2000 AND 2010";
            break;
        case 'after2010' :
            $sql .= " OR year > 2010";
            break;
    }
}

$result = $pdo->prepare($sql);
$result->bindParam(':priceMin', $priceMin, PDO::PARAM_INT);
$result->bindParam(':priceMax', $priceMax, PDO::PARAM_INT);
$result->execute();

//Affiche les résultats
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        include('templates/occasSearch.php');
    } 
}else {
    echo "Aucun véhicule trouvé pour les critères de recherche spécifiés.";
}
?>