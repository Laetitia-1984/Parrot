<div class="col-md-4">
    <div class="card">
        <img src=<?=getOccasionImage($occasion['image']);?> class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?=$occasion['mark'].' '.$occasion['model'].' '.$occasion['year'];?></h5>
            <p class="card-text">Kilométrages: <?=$occasion['km'];?> kms</p>
            <p class="card-text">Prix: <?=$occasion['price'];?> euros</p>
            <a href="recette.php?id=<?=$occasion['id'];?>" class="btn btn-primary">Voir l'annonce</a>
        </div>
    </div>
</div>