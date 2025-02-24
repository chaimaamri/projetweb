<?php
// Inclure la classe TravelOffer et le contrôleur
require_once __DIR__ . '/../../Model/TravelOffer.php';
require_once __DIR__ . '/../../Controller/TravelOfferController.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $title = $_POST['title'] ?? null;
    $destination = $_POST['destination'] ?? null;
    $departure_date = $_POST['departure_date'] ?? null;
    $return_date = $_POST['return_date'] ?? null;
    $price = $_POST['price'] ?? null;
    $disponibility = isset($_POST['disponibility']) ? true : false; // Case à cocher
    $category = $_POST['category'] ?? null;

    // Valider les données
    $errors = [];
    if (empty($title)) $errors[] = "Le titre est obligatoire.";
    if (empty($destination)) $errors[] = "La destination est obligatoire.";
    if (empty($departure_date)) $errors[] = "La date de départ est obligatoire.";
    if (empty($return_date)) $errors[] = "La date de retour est obligatoire.";
    if (empty($price)) $errors[] = "Le prix est obligatoire.";
    if (empty($category)) $errors[] = "La catégorie est obligatoire.";

    if (count($errors) === 0) {
        // Convertir les dates en objets DateTime
        try {
            $departure_date = new DateTime($departure_date);
            $return_date = new DateTime($return_date);
        } catch (Exception $e) {
            die("Format de date invalide.");
        }

        // Créer un objet TravelOffer
        $offre1 = new TravelOffer(
            1, // ID (peut être généré dynamiquement dans un cas réel)
            $title,
            $destination,
            $departure_date,
            $return_date,
            (float)$price,
            $disponibility,
            $category
        );

        // Afficher les informations avec var_dump() de manière organisée
        echo '<h2 style="color: red;">Affichage avec var_dump() :</h2>';
        echo "<pre>";
        var_dump($offre1);
        echo "</pre>";

        // Afficher les informations avec la méthode showTravelOffer()
        $controller = new TravelOfferController();
        $controller->showTravelOffer($offre1);
    } else {
        // Afficher les erreurs
        echo "<h2>Erreurs :</h2>";
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
} else {
    echo "<p style='color: red;'>Le formulaire n'a pas été soumis.</p>";
}