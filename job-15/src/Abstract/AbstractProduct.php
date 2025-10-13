<?php

namespace App\Abstract;

use DateTime;
use PDO;
use App\Database\Database;
use App\Category\Category;

abstract class AbstractProduct


{
    protected int $id = 0;
    protected int $category_id;
    protected string $name = '';
    protected array $photos = [];
    protected int $price = 0;
    protected string $description = '';
    protected int $quantity = 1;
    protected DateTime $createdAt;
    protected DateTime $updatedAt;

    public function __construct(int $id, string $name, array $photos, int $price, string $description, int $quantity, DateTime $createdAt, DateTime $updatedAt, int $category_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->category_id = $category_id;
    }

    // méthode abstract instancié dans la classe fille
    abstract public function create();
    abstract public function update();
    abstract public function findOneById(int $id);
    abstract public static function fromArray(array $row);

    // méthodes communes 
    public function getCategory(): ?Category
    {
        $pdo = Database::getConnexion();
        $stmt = $pdo->prepare('SELECT * FROM category WHERE id = :id');
        $stmt->execute(['id' => $this->category_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? new Category(
            (int)$row['id'],
            (string)$row['name'],
            (string)$row['description'],
            new DateTime($row['createdAt']),
            new DateTime($row['updatedAt'])
        ) : null;
    }

    // Getters 
    public function GetId(): int
    {
        return $this->id;
    }
    public function GetName(): string
    {
        return $this->name;
    }
    public function GetPhotos(): array
    {
        return $this->photos;
    }
    public function GetPrice(): int
    {
        return $this->price;
    }
    public function GetDescription(): string
    {
        return $this->description;
    }
    public function GetQuantity(): int
    {
        return $this->quantity;
    }
    public function GetCategoryId(): int
    {
        return $this->category_id;
    }

    
    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setPhotos(array $photos): void
    {
        $this->photos = $photos;
    }
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
    public function setDescription(string $desc): void
    {
        $this->description = $desc;
    }
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }
}
