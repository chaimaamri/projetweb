<?php
require_once __DIR__ . '/../../Model/TravelOffer.php';
require_once __DIR__ . '/../../Controller/TravelOfferController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? null;
    $destination = $_POST['destination'] ?? null;
    $departure_date = $_POST['departure_date'] ?? null;
    $return_date = $_POST['return_date'] ?? null;
    $price = $_POST['price'] ?? null;
    $disponibility = isset($_POST['disponibility']) ? true : false;
    $category = $_POST['category'] ?? null;

    $errors = [];
    if (empty($title)) $errors[] = "!! Le titre est obligatoire !!";
    if (empty($destination)) $errors[] = "!! La destination est obligatoire !!";
    if (empty($departure_date)) $errors[] = "!! La date de départ est obligatoire !!";
    if (empty($return_date)) $errors[] = "!! La date de retour est obligatoire !!";
    if (empty($price)) $errors[] = "!! Le prix est obligatoire !!";
    if (empty($category)) $errors[] = "!! La catégorie est obligatoire !!";

    if (count($errors) === 0) {
        try {
            $departure_date = new DateTime($departure_date);
            $return_date = new DateTime($return_date);
        } catch (Exception $e) {
            die("Format de date invalide.");
        }

        $offre1 = new TravelOffer(
            $title,
            $destination,
            $departure_date,
            $return_date,
            (float)$price,
            $disponibility,
            $category
        );

        $controller = new TravelOfferController();
        $controller->addOffer($offre1);
        header("Location: ListOffers.php");
        exit();
    } else {
        echo "<h2 style='color: red;'>Erreurs :</h2>";
        foreach ($errors as $error) {
            echo "<p style='color: black;'>$error</p>";
        }
    }
} else {
    echo "<p style='color: red;'>Le formulaire n'a pas été soumis.</p>";
}