<?php 

// Connexion à la BDD

$dsn = 'mysql:dbname=wf3_php_intermediaire_marilene;host=localhost;charset=UTF8';
$user = 'root';
$password = 'root'; // on Mac

try {
    $bdd = new PDO($dsn, $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
    exit();
}


// Demarrer la session

session_start();

// Initialiser la variable $msg

$msg = "";


// On définit l'URL du site web




define("UPLOADS_FILES", $_SERVER["DOCUMENT_ROOT"] . "/php-courses/marilene-khieu-examen-php/"); // Constante pour acceder au fichier de téléchargement en écriture
define("URL", "http://localhost:8888/php-courses/marilene-khieu-examen-php/"); // On Mac

