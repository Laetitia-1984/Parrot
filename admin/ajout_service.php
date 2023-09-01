<?php 
    require_once('../library/config.php');
    require_once('../library/session.php');
    adminOnly();
    
    require_once('templates/header.php');
    require_once('../library/pdo.php');
    require_once('../library/service.php');
    require_once('../library/tools.php');

    $errors = [];
    $messages = [];
    $service = [
        'category' => '',
        'title' => '',
        'description' => '',
        'price' => '',
    ];

    if (isset($_GET['id'])) {
        $service = getServiceById($pdo, $_GET['id']);
        if ($service === false) {
            $errors[] = "L'article n'existe pas";
        }
        $pageTitle = "Formulaire modification service";
    } else {
        $pageTitle = "Formulaire ajout service";
    }

    if (isset($_POST['saveService'])) { //Affichage du formulaire si il est plein sinon rien
        $service = [
            'category' => $_POST['category'],
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
        ];
        // S'il n' y a pas d'erreur, on sauvegarde
        if (!$errors) {
            if (isset($_GET["id"])) {
                $id = (int)$_GET["id"];
            } else {
                $id = null;
            }
            //On passe toutes les données à la fonction getService
            $res = saveService($pdo, $_POST['category'], $_POST['title'], $_POST['description'], $_POST['price'], $id);
        
            if ($res) {
                $messages[] = 'Le service a bien été sauvegardé';
                //On vide le tableau pour avoir les champs du formulaire vides
                if (!isset($_GET["id"])) {
                    $service = [
                        'category' => '',
                        'title' => '',
                        'description' => '',
                        'price' => ''
                    ];
                }
            } else {
                $errors[] = 'Le service n\'a pas été sauvegardé';
            }
        }
    }
?>
<h1><?= $pageTitle; ?></h1>

<?php foreach ($messages as $message) { ?> <!-- Parcours du tableau des messages -->
    <div class="alert alert-success">
        <?=$message; ?>
    </div>
<?php } ?>

<?php foreach ($errors as $error) { ?> <!-- Parcours du tableau des messages -->
    <div class="alert alert-danger">
        <?=$error; ?>
    </div>
<?php } ?>

<?php if ($service !== false) { ?>
<!--Formulaire ajout de services -->
<form method="POST" enctype="multipart/form-data" class="form_service">
    <div class="mb-3">
        <label for="category" class="form-label">Catégorie</label>
        <select name="category" id="category" class="form-select list-cat">
            <?php foreach ($cats as $cat) { ?>
                <option value="<?=$cat; ?>"><?=$cat; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="title">Titre du service</label>
        <input type="text" name="title" id="title" class="form-control form-text" value="<?= $service['title']; ?>">
    </div>
    <div class="mb-3">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="5" class="form-control form-text" value="<?= $service['description']; ?>"></textarea>
    </div>
    <div class="mb-3">
        <label for="price">Prix</label>
        <input name="price" id="price" cols="30" rows="5" class="form-control form-text" value="<?= $service['price']; ?>">
    </div>
    <input type="submit" value="Envoyer" name="saveService" class="btn btn-outline-primary me-2">
</form>

<?php }?>

<?php 
    require_once('templates/footer.php')
?>