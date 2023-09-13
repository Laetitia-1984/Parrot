<?php
    require_once('templates/header.php');
    require_once('library/occasion.php');
    require_once('library/tools.php');

    $id = (int)$_GET['id']; //(int) permet de dire quel format on attend
    
    $occasion = getOccasionById($pdo, $id);

    if ($occasion) {
        $descriptions = linesToArray($occasion['description']);
    
?>

    <div class="row flex-lg-row-reverse align-items-center py-5">
        <div class="col-lg-12 text-center">
            <h1 class="display-5 fw-bold lh-1 mb-3 detail-car"><?=$occasion['mark'] .' '. $occasion['model'] . ' ' . $occasion['year'];?></h1>
        </div>
    </div>
    <div class="p-occas-detail text-center">
        <p>Si vous souhaitez avoir plus d'informations sur cette annonce, n'hésitez pas et cliquez sur le lien ci-dessous</p>
        <a href="formulaire_contact.php">Contactez nous</a>
    </div>
    
    <div class="row flex-row align-items-center g-5 py-5">
        <div class="col-3 col-sm-8 col-lg-6">
            <img src="<?=getOccasionImage($occasion['image']);?>" class="d-block mx-lg-auto img-fluid" width="200" height="100" loading="lazy">
        </div>
        <div class="col-3 col-sm-8 col-lg-6">
            <img src="<?=getOccasionImage($occasion['image2']);?>" class="d-block mx-lg-auto img-fluid" width="200" height="100" loading="lazy">
        </div>
        <div class="col-3 col-sm-8 col-lg-6">    
            <img src="<?=getOccasionImage($occasion['image3']);?>" class="d-block mx-lg-auto img-fluid" width="200" height="100" loading="lazy">
        </div>
        <div class="col-3 col-sm-8 col-lg-6">    
            <img src="<?=getOccasionImage($occasion['image4']);?>" class="d-block mx-lg-auto img-fluid" width="200" height="100" loading="lazy">
        </div>
    </div>
    <div class="row flex-lg-row align-items-center g-5 py-3">
        <h2>Equipements</h2>
        <ul class="list-group">
            <?php foreach($descriptions as $key => $description) { ?>
                <li class="list-group-item"><?=$description;?></li>
            <?php } ?>
        </ul>
    </div>
    <div>
        <a href="occasions.php">Retour à la liste d'occasions</a>
    </div>

    <?php } else { ?>
        <div class="row text-center">
            <h1>Recette introuvable</h1>
        </div>
    <?php } 
        require_once ('templates/footer.php');
    ?>

    