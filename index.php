<?php 


include_once("inc/init.inc.php");
include_once("inc/functions.inc.php");

// debug($_SERVER);

// 1. Je lance ma requête que je trie par ordre décroissant
$resultQuery = $bdd->query("SELECT * FROM advert ORDER by id DESC");
$allAdds = $resultQuery->fetchAll(PDO::FETCH_ASSOC);

// debug($allAdds); // Retourne un tableau dans un tableau


include_once("inc/head.inc.php");
include_once("inc/header.inc.php");
?>

<main class="text-center mt-5">

    <h1 class="mb-5">Découvrez nos 5 dernières annonces</h1>

    <div class="container-fluid">
        <div class="row">
            <!-- 2. Je parcoure les 5 annonces -->
            <?php

            $arrayLength = 5;

            for($x = 0; $x < $arrayLength; $x++) {
            ?>

                <div class="card" style="width: 18rem;">
                <img src="<?= URL ?>assets/images/appartement.jpeg" class="card-img-top" alt="Photo de l'appartement">

                <div class="card-body">
                    <h5 class="card-title"><?= strtoupper($allAdds[$x]["title"]) ?></h5>
                    <p class="card-text"><?= substr($allAdds[$x]["description"], 0, 60) ?></p>
                    <a href="<?= URL ?>consulter-annonce.php?id=<?= $allAdds[$x]["id"] ?>" class="btn btn-primary">Consulter l'annonce</a>
                </div>
            </div>        

            <?php
            }
            ?>

            

        </div>

        <button type="button" class="btn btn-warning"><a href="<?= URL ?>consulter-les-annonces.php">Voir toutes les annonces</a></button>

    </div>

</main>

<?php
include_once("inc/footer.inc.php");
