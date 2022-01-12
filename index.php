<?php 


include_once("inc/init.inc.php");
include_once("inc/functions.inc.php");

// debug($_SERVER);

// 1. Je lance ma requête 
$resultQuery = $bdd->query("SELECT * from advert");
$allAdds = $resultQuery->fetchAll(PDO::FETCH_ASSOC);
$addsSorted = rsort($allAdds, SORT_NUMERIC);

// debug($allAdds); // Retourne un tableau dans un tableau
// debug($allAdds[0]);
// debug($addsSorted);
// echo $addsSorted;


include_once("inc/head.inc.php");
include_once("inc/header.inc.php");
?>

<main class="text-center mt-5">

    <h1>Découvrez les 5 dernières annonces publiées</h1>

    <div class="container-fluid">
        <div class="row">
            <!-- 2. Je parcoure toutes les annonces et :
            a. À FAIRE : je dois ranger par ordre du plus récent au plus ancien
            b. DONE : mettre le titre en maj -->
            <?php
            foreach($allAdds as $index => $add) {
            ?>
                    
            <div class="card" style="width: 18rem;">
                <img src="<?= URL ?>assets/images/appartement.jpeg" class="card-img-top" alt="Photo de l'appartement">

                <div class="card-body">
                    <h5 class="card-title"><?= strtoupper($add["title"]) ?></h5>
                    <p class="card-text"><?= substr($add["description"], 0, 60) ?></p>
                    <a href="<?= URL ?>consulter-annonce.php?id=<?= $add["id"] ?>" class="btn btn-primary">Voir détails de l'annonce</a>
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
