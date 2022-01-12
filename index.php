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

<main class="text-center mt-5 mb-4">

    <h1 class="mb-5">Découvrez les 5 annonces les plus récentes</h1>

    <div class="container-fluid">
        <div class="row d-flex justify-content-center col-10 mx-auto mb-2">
            <!-- 2. Je parcoure les 5 annonces -->
            <?php

            $arrayLength = 5;

            for($x = 0; $x < $arrayLength; $x++) {
            ?>

                <div class="card m-3" style="width: 18rem;">
                <a href="<?= URL ?>consulter-annonce.php?id=<?= $allAdds[$x]["id"] ?>"><img src="<?= URL ?>assets/images/appartement.jpeg" class="card-img-top" alt="Photo de l'appartement"></a>

                <div class="card-body">
                    <h5 class="card-title"><?= strtoupper($allAdds[$x]["title"]) ?>...</h5>
                    <p class="card-text"><?= substr($allAdds[$x]["description"], 0, 60) ?></p>

                    <?php 
                    if ($allAdds[$x]["reservation_message"] != null) {
                    ?>
                    
                        <span class="badge bg-success mb-3">Réservé</span>
                    
                    <?php
                    } else {
                    ?>
                        <span class="badge bg-warning mb-3">Disponible</span>
                    <?php
                    }
                    ?>

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
