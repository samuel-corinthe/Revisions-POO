<?php require_once 'Product.php'; 


class Clothing extends Product
{
    private string $size;
    private string $color;
    private string $type;
    private int $material_fee;

    public function __construct(int $id, string $name, array $photos, int $price, string $description, int $quantity, DateTime $createdAt, DateTime $updatedAt, int $category_id, string $size, string $color, string $type, int $material_fee)
    {
        parent::__construct($id, $name, $photos, $price, $description, $quantity, $createdAt, $updatedAt, $category_id);
        $this->size = $size;
        $this->color = $color;
        $this->type = $type;
        $this->material_fee = $material_fee;
    }

    public function create(): Clothing|false
    {
        $pdo = Database::getConnexion();
        $pdo->beginTransaction();

        try {

            parent::create();

            $stmt = $pdo->prepare('
                INSERT INTO clothing (product_id, size, color, type, material_fee)
                VALUES (:product_id, :size, :color, :type, :material_fee)
            ');

            $stmt->execute([
                'product_id' => $this->GetId(),
                'size' => $this->size,
                'color' => $this->color,
                'type' => $this->type,
                'material_fee' => $this->material_fee
            ]);

            $pdo->commit();
            return $this;
        } catch (PDOException $e) {
            $pdo->rollBack();
            echo "Erreur lors de la création du vêtement : " . $e->getMessage();
            return false;
        }
    }

    // Hydratation 
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
    public function getSize(): string
    {
        return $this->size;
    }
    public function getColor(): string
    {
        return $this->color;
    }
    public function getType(): string
    {
        return $this->type;
    }
    public function getMaterialFee(): int
    {
        return $this->material_fee;
    }
    
}