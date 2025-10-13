<?php require_once 'Product.php'; 

class Electronic extends Product
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

    public function create(): Electronic|false
    {
        $pdo = Database::getConnexion();
        $pdo->beginTransaction();

        try {
            parent::create();

            $stmt = $pdo->prepare('
                INSERT INTO electronic (product_id, brand, warranty_fee)
                VALUES (:product_id, :brand, :warranty_fee)
            ');

            $stmt->execute([
                'product_id' => $this->GetId(),
                'brand' => $this->brand,
                'warranty_fee' => $this->warranty_fee
            ]);

            $pdo->commit();
            return $this;
        } catch (PDOException $e) {
            $pdo->rollBack();
            echo "Erreur lors de la création de l'électronique : " . $e->getMessage();
            return false;
        }
    }

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
    public function getBrand(): string
    {
        return $this->brand;
    }
    public function getWarrantyFee(): int
    {
        return $this->warranty_fee;
    }
}
