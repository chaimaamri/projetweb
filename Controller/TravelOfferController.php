<?php

class TravelOfferController {
    public function showTravelOffer($offer) {
        echo '<h2 style="color: red;">Travel Offer Details</h2>';
        echo "<table border='1'>";
        echo "<tr><th>Title</th><th>Destination</th><th>Departure Date</th><th>Return Date</th><th>Price</th><th>Disponibility</th><th>Category</th></tr>";
        echo "<tr>";
        echo "<td>" . htmlspecialchars($offer->getTitle()) . "</td>";
        echo "<td>" . htmlspecialchars($offer->getDestination()) . "</td>";
        echo "<td>" . $offer->getDepartureDate()->format('Y-m-d') . "</td>";
        echo "<td>" . $offer->getReturnDate()->format('Y-m-d') . "</td>";
        echo "<td>" . number_format($offer->getPrice(), 2) . "€</td>";
        echo "<td>" . ($offer->getDisponibility() ? 'Yes' : 'No') . "</td>";
        echo "<td>" . htmlspecialchars($offer->getCategory()) . "</td>";
        echo "</tr>";
        echo "</table>";
    }
}