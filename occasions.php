<?php
    require_once('templates/header.php');
    require_once('library/occasion.php');
    require_once('library/config.php');
    require_once('library/pdo.php');

    $occasions = getOccasions($pdo);
?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <h1>Liste des voitures d'occasions</h1>
</div>

<p class="p-form-filtre">Filtrer</p>
<form method="POST" class="search-form">
    <div>
        <label for="priceMin">Prix minimum: </label>
        <input type="text" name="priceMin" id="priceMin">
    </div>
    <div>
        <label for="priceMax">Prix maximum: </label>
        <input type="text" name="priceMax" id="priceMax">
    </div>
    <div>
        <label for="km">Kilomètres: </label>
        <input type="radio" name="km" id="km_0_50000" value="0-50000">0 à 50 000 km
        <input type="radio" name="km" id="km_50000_100000" value="50000-100000">50 000 à 100 000 km
        <input type="radio" name="km" id="km_100000_plus" value="100000-plus"> + de 100 000 kms
    </div>
    
    <label for="year">Année: </label>
    <select name="year" id="year">
        <option value="1990-2000">De 1990 à 2000</option>
        <option value="2000-2010">De 2000 à 2010</option>
        <option value="after2010">Après 2010</option>
    </select>
    <input type="submit" value="Filtrer">
</form>

<?php
    if (!empty($_POST)) { ?>
        <div class="row">
            <?php 
                include('recherche.php');
            ?>
        </div>
    <?php } else { ?>
        <div class="row">
            <?php foreach ($occasions as $key => $occasion) { 
                include('templates/occasion_partial.php');
            }?>   
        </div>
    <?php } ?>
    
    <?php
    require_once ('templates/footer.php');
    ?>
