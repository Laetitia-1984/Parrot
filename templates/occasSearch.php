<div class="col-md-3 my-1">
    <div class="card">
        <img src="<?=$imagePath = 'uploads/occasions/' . $row['image'];?>" class="card-img-top" alt="<?=$row['model']?>">
        <div class="card-body text-center">
            <h5 class="card-title mark-model-car"><?=$row['mark'].' '.$row['model']?></h5>
            <p class="card-text">Kilométrages: <?=$row['km']?> kms</p>
            <p class="card-text">Prix: <?=$row['price']?> euros</p>
            <p class="card-text">Année: <?=$row['year']?></p>
            <a href="occasion.php?id=<?=$row['id'];?>" class="btn btn-outline-primary me-2">Voir l'annonce</a>
        </div>
    </div>
</div>