<?php 
    $imagePath = getOccasionImage($occasion['image']);
?>

<div class="col-md-3 my-1">
    <div class="card">
        <img src="<?=$imagePath?>" class="card-img-top" alt="<?=htmlEntities($occasion['model'])?>">
        <div class="card-body text-center">
            <h5 class="card-title mark-model-car"><?=htmlEntities($occasion['mark'].' '.htmlEntities($occasion['model']))?></h5>
            <p class="card-text">Kilométrages: <?=htmlEntities($occasion['km'])?> kms</p>
            <p class="card-text">Prix: <?=htmlEntities($occasion['price'])?> euros</p>
            <a href="occasion.php?id=<?=$occasion['id'];?>" class="btn btn-outline-primary me-2">Voir l'annonce</a>
        </div>
    </div>
</div>