<?php require_once 'AbstractProduct.php';
require_once 'StockableInterface.php';

class Category
{
    private int $id = 0;
    private string $name = '';
    private string $description = '';
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

    // Getters
    public function GetId(): int
    {
        return $this->id;
    }
    public function GetName(): string
    {
        return $this->name;
    }
    public function GetDescription(): string
    {
        return $this->description;
    }
    public function GetCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
    public function GetUpdatedAt(): DateTime
    {
        return $this->updatedAt;
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

    // récup product lié
    public function getProducts(): array
    {
        $pdo = Database::getConnexion();
        $stmt = $pdo->prepare('SELECT * FROM product WHERE category_id = :category_id');
        $stmt->execute(['category_id' => $this->id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $products = [];
        foreach ($rows as $row) {
            $products[] = AbstractProduct::fromArray($row);
        }

        return $products;
    }
}
