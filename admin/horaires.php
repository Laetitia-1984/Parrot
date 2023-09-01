<?php 
    require_once('templates/header.php');
    require_once('../library/pdo.php');
    require_once('../library/config.php');
?>

<h1>Horaires d'ouverture</h1>

<form method="POST" enctype="multipart/form-data" class="form_horaires">
        <div class="row">
            <div class="col mb-3">
                <label for="day" class="form-label list-days">Lundi</label>
            </div>
            <div class="col mb-3">
                <label for="hour_mat" class="form-label label-hours">Matin</label>
                <select name="hour_mat" id="hour_mat" class="form-select list-hours">
                    <?php foreach ($hours_mat as $key => $hour_mat) { ?>
                        <option value="<?=$hour_mat;?>"><?=$hour_mat;?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col mb-3">
                <label for="hour_apm" class="form-label label-hours">Apm</label>
                <select name="hour_apm" id="hour_apm" class="form-select list-hours">
                    <?php foreach ($hours_apm as $key => $hour_apm) { ?>
                        <option value="<?=$hour_apm;?>"><?=$hour_apm;?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col mb-3 my-4">
                <input type="submit" value="Envoyer" class="btn btn-outline-primary me-2">
            </div>
        </div>
</form>
