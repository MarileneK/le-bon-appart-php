<?php 


include_once("inc/init.inc.php");
include_once("inc/functions.inc.php");

// 1. Je lance ma requête 
$resultQuery = $bdd->query("SELECT * from advert");
$allAdds = $resultQuery->fetchAll(PDO::FETCH_ASSOC);


include_once("inc/head.inc.php");
include_once("inc/header.inc.php");
?>

<main class="text-center mt-5">
    <h1 class="mb-5">Consulter toutes les annonces</h1>

    <div class="container-fluid">
        <div class="row">
            <!-- 2. Je parcoure toutes les annonces et :
            a. DONE : mettre le titre en maj
            b. DONE : afficher un badge si le bien est réservé -->
            <?php
            foreach($allAdds as $index => $add) {
            ?>
                    
            <div class="card" style="width: 18rem;">
                <img src="<?= URL ?>assets/images/appartement.jpeg" class="card-img-top" alt="Photo de l'appartement">

                <div class="card-body">
                    <h5 class="card-title"><?= strtoupper($add["title"]) ?></h5>
                    <p class="card-text"><?= substr($add["description"], 0, 60) ?></p>

                    <!-- b. Affiche le badge si le bien est réservé, sinon dispo -->
                    <?php 
                    if ($add["reservation_message"] != null) {
                    ?>
                    
                        <span class="badge bg-success">Réservé</span>
                    
                    <?php
                    } else {
                    ?>
                        <span class="badge bg-warning">Disponible</span>
                    <?php
                    }
                    ?>

                    <a href="<?= URL ?>consulter-annonce.php?id=<?= $add["id"] ?>" class="btn btn-primary">Consulter l'annonce</a>
                </div>
            </div>

            <?php
            }
            ?>

        </div>
    </div>

</main>


<?php
include_once("inc/footer.inc.php");
