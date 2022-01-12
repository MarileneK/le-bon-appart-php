<?php 


include_once("inc/init.inc.php");
include_once("inc/functions.inc.php");

// 1. Check de la récupération de $_POST
// debug($_POST);
// Array
// (
//     [title] => test
//     [description] => test
//     [postal_code] => 92200
//     [city] => test
//     [type] => location
//     [price] => 200€
// )

// 2. Si $_POST n'est pas vide, ALORS je vais vérifier les valeurs récupérées
if (!empty($_POST)) {
    // 2.1. Je stocke les valeurs dans des variables

    $title = $_POST["title"];
    $description = $_POST["description"];
    $postal_code = $_POST["postal_code"];
    $city = $_POST["city"];
    $type = $_POST["type"];
    $price = $_POST["price"];

    // 2.2. Contrôle du titre
    if (!checkTitle($title)) {
        $msg .= "<div class=\"alert alert-danger\" role=\"alert\"> Le titre n'est pas valide. Vérifiez qu'il soit bien compris entre 5 et 200 caractères.</div>";
    }

    // 2.3. Contrôle de la description
    if (!checkDesc($description)) {
        $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
        La description n'est pas valide. Vérifiez qu'elle soit bien comprise entre 5 et 250 caractères.</div>";
    }

    // 2.4. Contrôle du code postal
    if (!checkZip($postal_code)) {
        $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
        Le code postal n'est pas valide. Vérifiez qu'il soit bien compris qu'il comprenne bien 5 chiffres.</div>";
    }

    // 2.5. Contrôle de tous les autres champs (ils doivent exister et ne doivent pas être vides)
    if (!notEmpty($city) OR !notEmpty($type) OR !notEmpty($price)) {
        $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
        Merci de bien vouloir remplir tous les champs.";
    }

    // 3. Si la variable $msg est vide = tous les champs sont remplis et conformes, ALORS je peux lancer ma requête
    if (empty($msg)) {

        // 3.1. Préparation et exécution de la requête
        $requestPrep = $bdd->prepare("INSERT INTO advert (title, description, postal_code, city, type, price) VALUES (?, ?, ?, ?, ?, ?);");

        $result = $requestPrep->execute([
            $title,
            $description,
            $postal_code,
            $city,
            $type,
            $price
        ]);

        // 3.2. Affichage d'un résultat en fonction du succès/échec de la requête
        if ($result) {
            $msg .= "<div class=\"alert alert-success\" role=\"alert\">
            Parfait ! Votre annonce \"$title\" a bien été ajoutée !</div>";
        } else {
            $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
            Quelque chose ne s'est pas passé correctement au niveau de l'enregistrement en base de données. </div>";
        }

    }

}


include_once("inc/head.inc.php");
include_once("inc/header.inc.php");
?>

<main class="text-center mt-5">
    <h1 class="text-center my-5">Ajouter votre annonce</h1>

        <form action="" method="post" class="container w-75 mx-auto">

            <div class="mb-3">
                <label for="title" class="form-label">Titre de l'annonce</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description de l'annonce</label>
                <textarea type="description" class="form-control" id="description" name="description" rows=5 cols=33></textarea>
            </div>

            <div class="mb-3">
                <label for="postal_code" class="form-label">Code postal</label>
                <input type="number" class="form-control" id="postal_code" name="postal_code">
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Ville</label>
                <input type="city" class="form-control" id="city" name="city">
            </div>

            <label for="type">Type d'annonce (location ou vente)</label>
            <select name="type" id="type">
                <option value="" selected disabled>-- Choisir --</option>
                <option value="location">Location</option>
                <option value="vente">Vente</option>
            </select>

            <div class="mb-3">
                <label for="number" class="form-label">Prix</label>
                <input type="price" class="form-control" id="price" name="price">
            </div>
            
            <input type="submit" value="Ajouter" class="btn btn-primary">

        </form>
</main>

<?php
include_once("inc/footer.inc.php");
