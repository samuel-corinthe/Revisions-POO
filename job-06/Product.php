<?php
class Database
{
    private static ?PDO $instance = null;

    private const DB_HOST = 'localhost';
    private const DB_NAME = 'draft_shop';
    private const DB_USER = 'root';
    private const DB_PASS = '';

    private function __construct() {}
    private function __clone() {}

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=utf8',
                    self::DB_USER,
                    self::DB_PASS
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erreur de connexion : ' . $e->getMessage());
            }
        }
        return self::$instance;
    }

    // raccourci
    public static function getConnexion(): PDO
    {
        return self::getInstance();
    }
}

class Product
{
    private int $id = 0;
    private int $category_id;
    private string $name = ' ';
    private array $photos = [];
    private int $price = 0;
    private string $description = ' ';
    private int $quantity = 1;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(
        int $id,
        string $name,
        array $photos,
        int $price,
        string $description,
        int $quantity,
        DateTime $createdAt,
        DateTime $updatedAt,
        int $category_id
    ) {
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

    // Hydratation
    public static function fromArray(array $row): Product
    {
        return new Product(
            (int) $row['id'],
            (string) $row['name'],
            json_decode($row['photos'], true) ?? [],
            (int) $row['price'],
            (string) $row['description'],
            (int) $row['quantity'],
            new DateTime($row['createdAt']),
            new DateTime($row['updatedAt']),
            (int) $row['category_id']
        );
    }

    // recup by id
    public static function findById(int $id): ?Product
    {
        $pdo = Database::getConnexion();
        $stmt = $pdo->prepare('SELECT * FROM product WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) return null;
        return self::fromArray($row);
    }

    // récup catégory
    public function getCategory(): ?Category
    {
        $pdo = Database::getConnexion();
        $stmt = $pdo->prepare('SELECT * FROM category WHERE id = :id');
        $stmt->execute(['id' => $this->category_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) return null;

        return new Category(
            (int)$row['id'],
            (string)$row['name'],
            (string)$row['description'],
            new DateTime($row['createdAt']),
            new DateTime($row['updatedAt'])
        );
    }

    // Getters
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

    // Setters
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


