<?php
require_once '../Controller/TravelOfferController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $travelOfferController = new TravelOfferController();
    $travelOfferController->deleteOffer($id);
    header("Location: ../ListOffers.php");
    exit();
} else {
    die('Requête invalide.');
}