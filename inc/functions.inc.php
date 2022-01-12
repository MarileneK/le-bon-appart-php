<?php


/**
 * La fonction debug a pour objectif d'afficher un echo pre de la liste envoyé en argument
 * @var array
 * @return null
 */

 function debug(array $liste){
    echo "<pre>";
    print_r($liste);
    echo "</pre>";
 }

// -----------------------------------------------

/**
 * Fonction checkTitle() va vérifier que le titre ne soit pas vide, qu'il existe bien et sa longueur
 * @var $title
 * @return bool true si les conditions sont vérifiées, SINON false
 */
 function checkTitle($title) {
    if (empty($title)) {
      return false;
    }

    if (!isset($title)) {
      return false;
    }

    if (strlen($title) < 6 OR strlen($title) > 201) {
      return false;
    }

    return true;
 }

// -----------------------------------------------

 /**
 * Fonction checkDesc() va vérifier que la description ne soit pas vide, qu'elle existe bien et sa longueur
 * @var $desc
 * @return bool true si les conditions sont vérifiées, SINON false
 */
function checkDesc($desc) {
  if (empty($desc)) {
    return false;
  }

  if (!isset($desc)) {
    return false;
  }

  if (strlen($desc) < 6 OR strlen($desc) > 251) {
    return false;
  }

  return true;
}

// -----------------------------------------------

 /**
 * Fonction checkZip() va vérifier que le code postal ne soit pas vide, qu'il existe bien et sa longueur
 * @var $zip
 * @return bool true si les conditions sont vérifiées, SINON false
 */
function checkZip($zip) {
   if (empty($zip)) {
     return false;
   }

   if (!isset($zip)) {
     return false;
   }

   if (strlen($zip) < 5 OR strlen($zip) > 6) {
     return false;
   }

   return true;
}

// -----------------------------------------------

function notEmpty($variable) {
    if (empty($variable)) {
      return false;
    }

    if (!isset($variable)) {
      return false;
    }
    
    return true;
}