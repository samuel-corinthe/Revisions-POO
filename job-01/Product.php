<?php 
// Initialisation
class Product {
    private int $id=0;
    private string $name=' '; 
    private array $photos;
    private int $price=0;
    private string $description=' ';
    private int $quantity=1;
    private DateTime $createdAt;
    private DateTime $updatedAt;

        public function __construct(int $id, string $name, array $photos, int $price, string $description, int $quantity, DateTime $createdAt, DateTime $updatedAt)
        {
            $this->id=$id;
            $this->name=$name;
            $this->photos=$photos;
            $this->price=$price;
            $this->description=$description;
            $this->quantity=$quantity;
            $this->createdAt=$createdAt;
            $this->updatedAt=$updatedAt;

        }

// Getter
        function GetId():  int {
            return $this->id;
        }
        function GetName(): string {
            return $this->name;
        }
        function GetPhotos(): array {
            return $this->photos;
        }
        function GetPrice(): int {
            return $this->price;
        }
        function GetDescription() {
            return $this->description;
        }
        function GetQuantity() {
            return $this->quantity;
        }
        function GetCreatedAt() {
            return $this->createdAt;
        }
        function GetUpdatedAt() {
            return $this->updatedAt;
        }

// Setter
    public function setId(int $id): void { 
        $this->id = $id;
     }
    public function setName(string $name): void { 
        $this->name = $name;
     }
    public function setPhotos(array $photos): void { 
        $this->photos = $photos;
    }
    public function setPrice(int $price): void { 
        $this->price = $price;
     }
    public function setDescription(string $description): void { 
        $this->description = $description;
     }
    public function setQuantity(int $quantity): void { 
        $this->quantity = $quantity;
     }
    public function setCreatedAt(DateTime $createdAt): void { 
        $this->createdAt = $createdAt;
     }
    public function setUpdatedAt(DateTime $updatedAt): void { 
        $this->updatedAt = $updatedAt;
     }
}