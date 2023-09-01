<?php 
    require_once('../library/config.php');
    require_once('../library/session.php');
    
    require_once('templates/header.php');
    require_once('../library/pdo.php');
    require_once('../library/occasion.php');
    require_once('../library/tools.php');

    $errors = [];
    $messages = [];
    $occasion = [
        'mark' => '',
        'model' => '',
        'year' => '',
        'km' => '',
        'price' => '',
        'description' => ''
    ];

    if (isset($_GET['id'])) {
        $occasion = getOccasionById($pdo, $_GET['id']);
        if ($occasion === false) {
            $errors[] = "L'annonce n'existe pas";
        }
        $pageTitle = "Formulaire modification occasion";
    } else {
        $pageTitle = "Formulaire ajout occasion";
    }

    if (isset($_POST['saveOccasion'])) { //Affichage du formulaire si il est plein sinon rien
        $fileName = null;
        $fileName2 = null;
        $fileName3 = null;
        $fileName4 = null;
        //Si un fichier a été envoye
        if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
            //La méthode getimagesize retourne false si le fichier n'est pas une image
            $checkImage = getimagesize($_FILES['file']['tmp_name']);
            if($checkImage !== false) {
                //Si c'est une image on traite
                //la méthode move_uploaded_files permet de déplacer une image vers un dossier.
                $fileName = slugify(basename($_FILES["file"]["name"]));
                $fileName = uniqid().'-'. $fileName;// Uniqid permet de créer un nom unique pour chaque fichier

                if (move_uploaded_file($_FILES["file"]["tmp_name"],_AJOUT_IMG_OCCASION_PATH_ . $fileName)) {
                    if (isset($_POST['image'])) {
                        //On supprime l'ancienne image si on poste une nouvelle
                        unlink(_AJOUT_IMG_OCCASION_PATH_.$_POST['image']);
                    }
                } else {
                    $errors[] = "Le fichier n'a pas été uploadé";
                }
            } else {
                //Sinon on affiche un message d'erreur
                $errors[] = 'Le fichier doit etre une image';
            }
        } else {
            //Si aucun fichier n'a été envoyé
            if (isset($_GET['id'])) {
                if (isset($_POST['delete_image'])) {
                    //Si on a coché la case de suppression d'image, on supprime l'image
                    unlink(_AJOUT_IMG_OCCASION_PATH_.$_POST['image']);
                } else {
                    $fileName = $_POST['image'];
                }
            }
        }

        if(isset($_FILES['file2']['tmp_name']) && $_FILES['file2']['tmp_name'] != '') {
            //La méthode getimagesize retourne false si le fichier n'est pas une image
            $checkImage = getimagesize($_FILES['file2']['tmp_name']);
            if($checkImage !== false) {
                //Si c'est une image on traite
                //la méthode move_uploaded_files permet de déplacer une image vers un dossier.
                $fileName2 = slugify(basename($_FILES["file2"]["name"]));
                $fileName2 = uniqid().'-'. $fileName2;// Uniqid permet de créer un nom unique pour chaque fichier

                if (move_uploaded_file($_FILES["file2"]["tmp_name"],_AJOUT_IMG_OCCASION_PATH_ . $fileName2)) {
                    if (isset($_POST['image2'])) {
                        //On supprime l'ancienne image si on poste une nouvelle
                        unlink(_AJOUT_IMG_OCCASION_PATH_.$_POST['image2']);
                    }
                } else {
                    $errors[] = "Le fichier n'a pas été uploadé";
                }
            } else {
                //Sinon on affiche un message d'erreur
                $errors[] = 'Le fichier doit etre une image';
            }
        } else {
            //Si aucun fichier n'a été envoyé
            if (isset($_GET['id'])) {
                if (isset($_POST['delete_image2'])) {
                    //Si on a coché la case de suppression d'image, on supprime l'image
                    unlink(_AJOUT_IMG_OCCASION_PATH_.$_POST['image2']);
                } else {
                    $fileName2 = $_POST['image2'];
                }
            }
        }

        if(isset($_FILES['file3']['tmp_name']) && $_FILES['file3']['tmp_name'] != '') {
            //La méthode getimagesize retourne false si le fichier n'est pas une image
            $checkImage = getimagesize($_FILES['file3']['tmp_name']);
            if($checkImage !== false) {
                //Si c'est une image on traite
                //la méthode move_uploaded_files permet de déplacer une image vers un dossier.
                $fileName3 = slugify(basename($_FILES["file3"]["name"]));
                $fileName3 = uniqid().'-'. $fileName3;// Uniqid permet de créer un nom unique pour chaque fichier

                if (move_uploaded_file($_FILES["file3"]["tmp_name"],_AJOUT_IMG_OCCASION_PATH_ . $fileName3)) {
                    if (isset($_POST['image3'])) {
                        //On supprime l'ancienne image si on poste une nouvelle
                        unlink(_AJOUT_IMG_OCCASION_PATH_.$_POST['image3']);
                    }
                } else {
                    $errors[] = "Le fichier n'a pas été uploadé";
                }
            } else {
                //Sinon on affiche un message d'erreur
                $errors[] = 'Le fichier doit etre une image';
            }
        } else {
            //Si aucun fichier n'a été envoyé
            if (isset($_GET['id'])) {
                if (isset($_POST['delete_image3'])) {
                    //Si on a coché la case de suppression d'image, on supprime l'image
                    unlink(_AJOUT_IMG_OCCASION_PATH_.$_POST['image3']);
                } else {
                    $fileName3 = $_POST['image3'];
                }
            }
        }

        if(isset($_FILES['file4']['tmp_name']) && $_FILES['file4']['tmp_name'] != '') {
            //La méthode getimagesize retourne false si le fichier n'est pas une image
            $checkImage = getimagesize($_FILES['file4']['tmp_name']);
            if($checkImage !== false) {
                //Si c'est une image on traite
                //la méthode move_uploaded_files permet de déplacer une image vers un dossier.
                $fileName4 = slugify(basename($_FILES["file4"]["name"]));
                $fileName4 = uniqid().'-'. $fileName4;// Uniqid permet de créer un nom unique pour chaque fichier

                if (move_uploaded_file($_FILES["file4"]["tmp_name"],_AJOUT_IMG_OCCASION_PATH_ . $fileName4)) {
                    if (isset($_POST['image4'])) {
                        //On supprime l'ancienne image si on poste une nouvelle
                        unlink(_AJOUT_IMG_OCCASION_PATH_.$_POST['image4']);
                    }
                } else {
                    $errors[] = "Le fichier n'a pas été uploadé";
                }
            } else {
                //Sinon on affiche un message d'erreur
                $errors[] = 'Le fichier doit etre une image';
            }
        } else {
            //Si aucun fichier n'a été envoyé
            if (isset($_GET['id'])) {
                if (isset($_POST['delete_image4'])) {
                    //Si on a coché la case de suppression d'image, on supprime l'image
                    unlink(_AJOUT_IMG_OCCASION_PATH_.$_POST['image4']);
                } else {
                    $fileName4 = $_POST['image4'];
                }
            }
        }
        $occasion = [
            'mark' => $_POST['mark'],
            'model' => $_POST['model'],
            'year' => $_POST['year'],
            'km' => $_POST['km'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'image' => $fileName,
            'image2' => $fileName2,
            'image3' => $fileName3,
            'image4' => $fileName4
        ];
        // S'il n' y a pas d'erreur, on sauvegarde
        if (!$errors) {
            if (isset($_GET["id"])) {
                $id = (int)$_GET["id"];
            } else {
                $id = null;
            }
            //On passe toutes les données à la fonction getService
            $res = saveOccasion($pdo, $_POST['mark'], $_POST['model'], $_POST['year'], $_POST['km'], $_POST['price'], $_POST['description'], $fileName, $fileName2, $fileName3, $fileName4, $id);
        
            if ($res) {
                $messages[] = "L'occasion a bien été sauvegardée";
                //On vide le tableau pour avoir les champs du formulaire vides
                if (!isset($_GET["id"])) {
                    $occasion = [
                        'mark' => '',
                        'model' => '',
                        'year' => '',
                        'km' => '',
                        'price' => '',
                        'description' => '',
                    ];
                }
            } else {
                $errors[] = "L'occasion n\'a pas été sauvegardée";
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

<?php if ($occasion !== false) { ?>

<!--Formulaire ajout de services -->
<form method="POST" enctype="multipart/form-data" class="form_occasion">
    <div class="mb-3">
        <label for="mark">Marque</label>
        <input type="text" name="mark" id="mark" class="form-control form-text" value="<?= $occasion['mark']; ?>"></>
    </div>
    <div class="mb-3">
        <label for="model">Modèle</label>
        <input type="text" name="model" id="model" cols="30" rows="5" class="form-control form-text" value="<?= $occasion['model']; ?>"></>
    </div>
    <div class="mb-3">
        <label for="kms">Année</label>
        <input type="text" name="year" id="year" cols="30" rows="5" class="form-control form-text" value="<?= $occasion['year']; ?>"></>
    </div>
    <div class="mb-3">
        <label for="km">Kms</label>
        <input type="text" name="km" id="km" cols="30" rows="5" class="form-control form-text" value="<?= $occasion['km']; ?>"></>
    </div>
    <div class="mb-3">
        <label for="price">Prix</label>
        <input type="text" name="price" id="price" cols="30" rows="5" class="form-control form-text" value="<?= $occasion['price']; ?>"></>
    </div>
    <div class="mb-3">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="5" class="form-control form-text"><?= $occasion['description']; ?></textarea>
    </div>

    <?php if (isset($_GET['id']) && isset($occasion['image'])) { ?>
        <p>
            <img src="<?= _AJOUT_IMG_OCCASION_PATH_ . $occasion['image'] ?>" width="100"/>
            <label for="delete_image">Supprimer l'image</label>
            <input type="checkbox" name="delete_image" id="delete_image">
            <input type="hidden" name="image" value="<?= $occasion['image']; ?>">
        </p>
    <?php } ?>
    <p>
        <input type="file" name="file" id="file">
    </p>
    <?php if (isset($_GET['id']) && isset($occasion['image2'])) { ?>
        <p>
            <img src="<?= _AJOUT_IMG_OCCASION_PATH_ . $occasion['image2'] ?>" width="100"/>
            <label for="delete_image2">Supprimer l'image</label>
            <input type="checkbox" name="delete_image2" id="delete_image2">
            <input type="hidden" name="image2" value="<?= $occasion['image2']; ?>">
        </p>
    <?php } ?>
    <p>
        <input type="file" name="file2" id="file2">
    </p>
    <?php if (isset($_GET['id']) && isset($occasion['image3'])) { ?>
        <p>
            <img src="<?= _AJOUT_IMG_OCCASION_PATH_ . $occasion['image3'] ?>" width="100"/>
            <label for="delete_image3">Supprimer l'image</label>
            <input type="checkbox" name="delete_image3" id="delete_image3">
            <input type="hidden" name="image3" value="<?= $occasion['image3']; ?>">
        </p>
    <?php } ?>
    <p>
        <input type="file" name="file3" id="file3">
    </p>
    <?php if (isset($_GET['id']) && isset($occasion['image4'])) { ?>
        <p>
            <img src="<?= _AJOUT_IMG_OCCASION_PATH_ . $occasion['image4'] ?>" width="100"/>
            <label for="delete_image4">Supprimer l'image</label>
            <input type="checkbox" name="delete_image4" id="delete_image4">
            <input type="hidden" name="image4" value="<?= $occasion['image4']; ?>">
        </p>
    <?php } ?>
    <p>
        <input type="file" name="file4" id="file4">
    </p>
    <input type="submit" value="Envoyer" name="saveOccasion" class="btn btn-outline-primary me-2">
</form>
<?php } ?>

<?php 
    require_once('templates/footer.php')
?>