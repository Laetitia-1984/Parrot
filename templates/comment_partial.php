<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?=$comment['nameClient']; ?></h5>
            <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
            <?php if($comment['note'] === 5) { ?>
                <img src="assets/images/etoile.png"><img src=assets/images/etoile.png><img src=assets/images/etoile.png><img src=assets/images/etoile.png><img src=assets/images/etoile.png>
            <?php } elseif ($comment['note'] === 4) { ?>
                <img src=assets/images/etoile.png><img src=assets/images/etoile.png><img src=assets/images/etoile.png><img src=assets/images/etoile.png>
            <?php } elseif ($comment['note'] === 3) { ?>
                <img src=assets/images/etoile.png><img src=assets/images/etoile.png><img src=assets/images/etoile.png>
            <?php } elseif ($comment['note'] === 2) { ?>
                <img src=assets/images/etoile.png><img src=assets/images/etoile.png>
            <?php } elseif ($comment['note'] === 1) { ?>
                <img src=assets/images/etoile.png>
            <?php } else {
                echo '';
            } ?>
            <p class="card-text comment"><?=$comment['content']; ?></p>
    </div>
</div>

