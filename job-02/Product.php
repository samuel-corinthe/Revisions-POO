<?php
// Initialisation
class Product
{
    private int $id = 0;
    private int $category_id;
    private string $name = ' ';
    private array $photos;
    private int $price = 0;
    private string $description = ' ';
    private int $quantity = 1;
    private DateTime $createdAt;
    private DateTime $updatedAt;

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

    // Getter
    public function GetCategoryId(): int
    {
        return $this->category_id;
    }

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
    public function GetDescription()
    {
        return $this->description;
    }
    public function GetQuantity()
    {
        return $this->quantity;
    }
    public function GetCreatedAt()
    {
        return $this->createdAt;
    }
    public function GetUpdatedAt()
    {
        return $this->updatedAt;
    }

    // Setter
    public function setCategoryId(int $category_id): void
    {
         $this->category_id = $category_id;
    }
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
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}

// Initialisation
class Category
{
    private int $id = 0;
    private string $name = ' ';
    private string $description = ' ';
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(int $id, string $name, string $description, DateTime $createdAt, DateTime $updatedAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    // Getter
    public function GetId(): int
    {
        return $this->id;
    }
    public function GetName(): string
    {
        return $this->name;
    }
    public function GetDescription()
    {
        return $this->description;
    }
    public function GetCreatedAt()
    {
        return $this->createdAt;
    }
    public function GetUpdatedAt()
    {
        return $this->updatedAt;
    }

    // Setter
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
