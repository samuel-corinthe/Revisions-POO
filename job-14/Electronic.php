<?php
require_once 'AbstractProduct.php';
require_once 'StockableInterface.php';

class Electronic extends AbstractProduct implements StockableInterface
{
    private string $brand;
    private int $warranty_fee;

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
        string $brand,
        int $warranty_fee
    ) {
        parent::__construct($id, $name, $photos, $price, $description, $quantity, $createdAt, $updatedAt, $category_id);
        $this->brand = $brand;
        $this->warranty_fee = $warranty_fee;
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
    public function create(): Electronic|false
    {
        $pdo = Database::getConnexion();
        $pdo->beginTransaction();
        try {
            // détails produit 
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

            // detail classe élétrocnic
            $stmt = $pdo->prepare('INSERT INTO electronic (product_id, brand, warranty_fee) VALUES (:product_id, :brand, :warranty_fee)');
            $stmt->execute([
                'product_id' => $this->id,
                'brand' => $this->brand,
                'warranty_fee' => $this->warranty_fee
            ]);

            $pdo->commit();
            return $this;
        } catch (PDOException $e) {
            $pdo->rollBack();
            echo "Erreur création Electronic: " . $e->getMessage();
            return false;
        }
    }

    // update
    public function update(): Electronic|false
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

            $stmt = $pdo->prepare('UPDATE electronic SET brand=:brand, warranty_fee=:warranty_fee WHERE product_id=:product_id');
            $stmt->execute([
                'brand' => $this->brand,
                'warranty_fee' => $this->warranty_fee,
                'product_id' => $this->id
            ]);

            $pdo->commit();
            return $this;
        } catch (PDOException $e) {
            $pdo->rollBack();
            echo "Erreur update Electronic: " . $e->getMessage();
            return false;
        }
    }

    // récup by id
    public function findOneById(int $id): Electronic|false
    {
        $pdo = Database::getConnexion();
        $stmt = $pdo->prepare('
            SELECT p.*, e.brand, e.warranty_fee
            FROM product p
            JOIN electronic e ON p.id = e.product_id
            WHERE p.id = :id
        ');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? self::fromArray($row) : false;
    }

     // Hydratation
    public static function fromArray(array $row): Electronic
    {
        return new Electronic(
            (int)$row['id'],
            (string)$row['name'],
            json_decode($row['photos'], true) ?? [],
            (int)$row['price'],
            (string)$row['description'],
            (int)$row['quantity'],
            new DateTime($row['createdAt']),
            new DateTime($row['updatedAt']),
            (int)$row['category_id'],
            (string)$row['brand'],
            (int)$row['warranty_fee']
        );
    }

    // Getters
    public function getBrand(): string { return $this->brand; }
    public function getWarrantyFee(): int { return $this->warranty_fee; }
}
