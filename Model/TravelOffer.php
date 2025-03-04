<?php
class TravelOffer {

    public int $id;
    private string $title;
    private string $destination;
    private DateTime $departure_date;
    private DateTime $return_date;
    private float $price;
    private bool $disponibility;
    private string $category;

    public function __construct($title = null, $destination = null, $departure_date = null, $return_date = null, $price = null, $disponibility = null, $category = null)
    {
        $this->title = $title;
        $this->destination = $destination;
        $this->departure_date = is_string($departure_date) ? new DateTime($departure_date) : $departure_date;
        $this->return_date = is_string($return_date) ? new DateTime($return_date) : $return_date;
        $this->price = $price;
        $this->disponibility = $disponibility;
        $this->category = $category;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;
        return $this;
    }

    public function getDepartureDate(): ?DateTime
    {
        return $this->departure_date;
    }

    public function setDepartureDate(string $departure_date): self
    {
        $this->departure_date = new DateTime($departure_date);
        return $this;
    }

    public function getReturnDate(): ?DateTime
    {
        return $this->return_date;
    }

    public function setReturnDate(string $return_date): self
    {
        $this->return_date = new DateTime($return_date);
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getDisponibility(): bool
    {
        return $this->disponibility;
    }

    public function setDisponibility(bool $disponibility): self
    {
        $this->disponibility = $disponibility;
        return $this;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }
}