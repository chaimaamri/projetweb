<?php
// Inclure la classe TravelOffer
require_once __DIR__ . '/../../Model/TravelOffer.php';

// Créer une offre de voyage
$departureDate = new DateTime('2024-10-15');
$returnDate = new DateTime('2024-10-22');

$offre1 = new TravelOffer(
    1,
    "Discover Paris",
    "Paris, France",
    $departureDate,
    $returnDate,
    1200.50,
    true,
    "Cultural"
);

// Afficher les informations avec var_dump() de manière organisée
echo '<h2 style="color: red;">Affichage avec var_dump() :</h2>';
echo '<pre>';
var_dump($offre1);
echo '</pre>';

// Afficher les informations avec la méthode show()
echo '<h2 style="color: red;">Affichage avec la méthode show() :</h2>';
$offre1->show();