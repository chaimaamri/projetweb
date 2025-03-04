<?php
require_once __DIR__ . '/../Config.php';

class TravelOfferController {

    public function getOffers()
    {
        $db = config::getConnexion(); 
        $sql = "SELECT * FROM traveloffer";
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function addOffer(TravelOffer $travelOffer)
    {
        $db = config::getConnexion();
        $req = "INSERT INTO traveloffer(title, destination, departure_date, return_date, price, disponibility, category) VALUES(:title, :destination, :departure_date, :return_date, :price, :disponibility, :category)";
        try {
            $query = $db->prepare($req);
            $query->execute([
                'title' => $travelOffer->getTitle(),
                'destination' => $travelOffer->getDestination(),
                'departure_date' => $travelOffer->getDepartureDate()->format('Y-m-d'),
                'return_date' => $travelOffer->getReturnDate()->format('Y-m-d'),
                'price' => $travelOffer->getPrice(),
                'disponibility' => $travelOffer->getDisponibility() ? 1 : 0,
                'category' => $travelOffer->getCategory()
            ]);
            return true;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function deleteOffer($id) 
    {
        $db = config::getConnexion();
        $sql = "DELETE FROM traveloffer WHERE id = :id";
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);
            return true;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function updateOffer($id, TravelOffer $travelOffer) 
    {
        $db = config::getConnexion();
        $sql = "UPDATE traveloffer SET title = :title, destination = :destination, departure_date = :departure_date, return_date = :return_date, price = :price, disponibility = :disponibility, category = :category WHERE id = :id";
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
                'title' => $travelOffer->getTitle(),
                'destination' => $travelOffer->getDestination(),
                'departure_date' => $travelOffer->getDepartureDate()->format('Y-m-d'),
                'return_date' => $travelOffer->getReturnDate()->format('Y-m-d'),
                'price' => $travelOffer->getPrice(),
                'disponibility' => $travelOffer->getDisponibility() ? 1 : 0,
                'category' => $travelOffer->getCategory()
            ]);
            return true;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}