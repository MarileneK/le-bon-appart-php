<header>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= URL ?>">Le Bon Appart</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= URL ?>">Accueil</a>
                    </li>  

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= URL ?>ajouter-annonce.php">Ajouter une annonce</a>
                    </li>  

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= URL ?>consulter-annonce.php">Consulter une annonce</a>
                    </li>  

                </ul>
            </div>

        </div>
    </nav>
</header>
<div class="erreur"><?= $msg ?></div>