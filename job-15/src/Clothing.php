<?php
namespace App;

use App\Abstract\AbstractProduct;
use App\Interface\StockableInterface;
use App\Database\Database;
use DateTime;
use PDO;
use PDOException;


class Clothing extends AbstractProduct implements StockableInterface

{
    private string $size;
    private string $color;
    private string $type;
    private int $material_fee;

    public function __construct(
        int $id,
        string $name,
        array $photos,
        int $price,
        string $description,
        int $quantity,
        DateTime $createdAt,
        DateTime $updatedAt,
        int $category_id,
        string $size,
        string $color,
        string $type,
        int $material_fee
    ) {
        parent::__construct($id, $name, $photos, $price, $description, $quantity, $createdAt, $updatedAt, $category_id);
        $this->size = $size;
        $this->color = $color;
        $this->type = $type;
        $this->material_fee = $material_fee;
    }

    // gestion du stock
    public function addStocks(int $stock): static
    {
        $this->quantity += $stock;
        return $this;
    }

    public function removeStocks(int $stock): static
    {
        $this->quantity = max(0, $this->quantity - $stock);
        return $this;
    }

    // create
    public function create(): Clothing|false
    {
        $pdo = Database::getConnexion();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare('
                INSERT INTO product (name, photos, price, description, quantity, createdAt, updatedAt, category_id)
                VALUES (:name, :photos, :price, :description, :quantity, :createdAt, :updatedAt, :category_id)
            ');
            $stmt->execute([
                'name' => $this->name,
                'photos' => json_encode($this->photos, JSON_UNESCAPED_SLASHES),
                'price' => $this->price,
                'description' => $this->description,
                'quantity' => $this->quantity,
                'createdAt' => $this->createdAt->format('Y-m-d H:i:s'),
                'updatedAt' => $this->updatedAt->format('Y-m-d H:i:s'),
                'category_id' => $this->category_id
            ]);
            $this->id = (int)$pdo->lastInsertId();

            $stmt = $pdo->prepare('
                INSERT INTO clothing (product_id, size, color, type, material_fee)
                VALUES (:product_id, :size, :color, :type, :material_fee)
            ');
            $stmt->execute([
                'product_id' => $this->id,
                'size' => $this->size,
                'color' => $this->color,
                'type' => $this->type,
                'material_fee' => $this->material_fee
            ]);

            $pdo->commit();
            return $this;
        } catch (PDOException $e) {
            $pdo->rollBack();
            echo "Erreur création Clothing: " . $e->getMessage();
            return false;
        }
    }

    // update
    public function update(): Clothing|false
    {
        $pdo = Database::getConnexion();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare('
                UPDATE product SET name=:name, photos=:photos, price=:price, description=:description, quantity=:quantity, updatedAt=:updatedAt, category_id=:category_id
                WHERE id=:id
            ');
            $stmt->execute([
                'name' => $this->name,
                'photos' => json_encode($this->photos, JSON_UNESCAPED_SLASHES),
                'price' => $this->price,
                'description' => $this->description,
                'quantity' => $this->quantity,
                'updatedAt' => (new DateTime())->format('Y-m-d H:i:s'),
                'category_id' => $this->category_id,
                'id' => $this->id
            ]);

            $stmt = $pdo->prepare('
                UPDATE clothing SET size=:size, color=:color, type=:type, material_fee=:material_fee
                WHERE product_id=:product_id
            ');
            $stmt->execute([
                'size' => $this->size,
                'color' => $this->color,
                'type' => $this->type,
                'material_fee' => $this->material_fee,
                'product_id' => $this->id
            ]);

            $pdo->commit();
            return $this;
        } catch (PDOException $e) {
            $pdo->rollBack();
            echo "Erreur update Clothing: " . $e->getMessage();
            return false;
        }
    }

    // récup by id
    public function findOneById(int $id): Clothing|false
    {
        $pdo = Database::getConnexion();
        $stmt = $pdo->prepare('
            SELECT p.*, c.size, c.color, c.type, c.material_fee
            FROM product p
            JOIN clothing c ON p.id = c.product_id
            WHERE p.id = :id
        ');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? self::fromArray($row) : false;
    }

    public static function fromArray(array $row): Clothing
    {
        return new Clothing(
            (int)$row['id'],
            (string)$row['name'],
            json_decode($row['photos'], true) ?? [],
            (int)$row['price'],
            (string)$row['description'],
            (int)$row['quantity'],
            new DateTime($row['createdAt']),
            new DateTime($row['updatedAt']),
            (int)$row['category_id'],
            (string)$row['size'],
            (string)$row['color'],
            (string)$row['type'],
            (int)$row['material_fee']
        );
    }

    // Getters
    public function getSize(): string { return $this->size; }
    public function getColor(): string { return $this->color; }
    public function getType(): string { return $this->type; }
    public function getMaterialFee(): int { return $this->material_fee; }
}
