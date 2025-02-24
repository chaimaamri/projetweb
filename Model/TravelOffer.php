<?php

class TravelOffer {
    // Attributs privés
    private int $id;
    private string $title;
    private string $destination;
    private DateTime $departure_date;
    private DateTime $return_date;
    private float $price;
    private bool $disponibility;
    private string $category;

    // Constructeur paramétré
    public function __construct(
        int $id,
        string $title,
        string $destination,
        DateTime $departure_date,
        DateTime $return_date,
        float $price,
        bool $disponibility,
        string $category
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->destination = $destination;
        $this->departure_date = $departure_date;
        $this->return_date = $return_date;
        $this->price = $price;
        $this->disponibility = $disponibility;
        $this->category = $category;
    }

    // Getters pour accéder aux attributs privés
    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDestination(): string {
        return $this->destination;
    }

    public function getDepartureDate(): DateTime {
        return $this->departure_date;
    }

    public function getReturnDate(): DateTime {
        return $this->return_date;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getDisponibility(): bool {
        return $this->disponibility;
    }

    public function getCategory(): string {
        return $this->category;
    }

    // Méthode pour afficher les informations de l'offre de voyage dans un tableau HTML
    public function show(): void {
        echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
        echo "<tr>
                <th>Title</th>
                <th>Destination</th>
                <th>Departure Date</th>
                <th>Return Date</th>
                <th>Price</th>
                <th>Disponibility</th>
                <th>Category</th>
              </tr>";
        echo "<tr>";
        echo "<td>" . htmlspecialchars($this->title) . "</td>";
        echo "<td>" . htmlspecialchars($this->destination) . "</td>";
        echo "<td>" . $this->departure_date->format('Y-m-d') . "</td>";
        echo "<td>" . $this->return_date->format('Y-m-d') . "</td>";
        echo "<td>" . number_format($this->price, 2) . "€</td>";
        echo "<td>" . ($this->disponibility ? 'Yes' : 'No') . "</td>";
        echo "<td>" . htmlspecialchars($this->category) . "</td>";
        echo "</tr>";
        echo "</table>";
    }
}