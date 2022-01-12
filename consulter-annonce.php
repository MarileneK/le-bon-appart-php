<?php 


include_once("inc/init.inc.php");
include_once("inc/functions.inc.php");

// A. AFFICHER L'ANNONCE CLIQUÉE
// 1. Je récupère l'ID via le $_GET
// debug($_GET);

// 2. Je stocke l'ID dans une variable
$id = $_GET["id"];

// 3. Je lance ma requête
$requestPrep = $bdd->prepare("SELECT * FROM advert WHERE id = ?");
$resultRequest = $requestPrep->execute([
    $id
]);

$detailAdd = $requestPrep->fetch(PDO::FETCH_ASSOC);

// ----------------------------------------------

// B. TRAITEMENT SOUMISSION DU FORMULAIRE
// debug($_POST);

// 5. Je vérifie que $_POST existe et ne soit pas vide
if (isset($_POST) && !empty($_POST)) {

    $reservation_message = $_POST["reservation_message"];

    if ($reservation_message) {
        // $msg .= "Je passe dans mon if";

        // 5.1. Je lance ma requête UPDATE (préparation + exécution)
        $requestUpdate = $bdd->prepare("UPDATE advert SET reservation_message = ? WHERE id = ?;");

        $resultUpdate = $requestUpdate->execute([
            $reservation_message,
            $id
        ]);

        // 5.2. Message à afficher en fonction succès/échec de la requête
        if ($resultUpdate) {
            $msg .= "<div class=\"alert alert-success\" role=\"alert\">
            Votre message a bien été envoyé au propriétaire.</div>";
        } 
    }
}

// 6. Si $reservation_message est !empty, je veux qu'il affiche un badge

include_once("inc/head.inc.php");
include_once("inc/header.inc.php");
?>

<main class="text-center mt-5">
    <h1>Détails de l'annonce</h1>

    <!-- Card details -->
    <div class="card mb-3">
        <img class="card-img-top" src="<?= URL ?>assets/images/appartement.jpeg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= strtoupper($detailAdd["title"]) ?></h5>
                <p class="card-text"><?= $detailAdd["description"] ?></p>
                <p class="card-text"><?= $detailAdd["postal_code"] ?> <?= $detailAdd["city"] ?></p>
                <p class="card-text">Type d'annonce : <?= ucfirst($detailAdd["type"]) ?></p>
                <p class="card-text">Prix : <?= $detailAdd["price"] ?> €</p>
                <p class="card-text"><small class="text-muted">Référence de l'annonce : <?= $detailAdd["id"] ?></small></p>

                <?php 
                if ($detailAdd["reservation_message"] != null) {
                ?>

                    <span class="badge bg-success">Réservé</span>
                
                <?php
                } else {
                ?>
                    <span class="badge bg-warning">Disponible</span>
                <?php
                }
                ?>
                
                
            </div>
        </div>
    </div>

    <!-- 4. J'ajoute le formulaire pour "réservation_message" -->
    <!-- Form to book flat/house-->
    <form action="#" method="POST">
        <label for="reservation_message" class="form-label">Envoyer un message au propriétaire :</label>
        <textarea class="form-control" name="reservation_message" id="reservation_message" cols="30" rows="5" placeholder="Bonjour, je suis très intéressé(e) par votre bien ! J'aimerais le visiter. Voici mes coordonnées."></textarea>
        <input type="submit" value="Je réserve" class="btn btn-primary">
    </form>
</main>



<?php
include_once("inc/footer.inc.php");
