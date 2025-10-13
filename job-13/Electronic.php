<?php require_once 'AbstractProduct.php'; 


class Electronic extends AbstractProduct
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

    // create
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

    // récup all
    public static function findAll(): array
    {
        $pdo = Database::getConnexion();
        $stmt = $pdo->query('
            SELECT p.*, e.brand, e.warranty_fee
            FROM product p
            JOIN electronic e ON p.id = e.product_id
        ');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $electronics = [];
        foreach ($rows as $row) {
            $electronics[] = self::fromArray($row);
        }

        return $electronics;
    }

    // update
    public function update(): Electronic|false
    {
        $pdo = Database::getConnexion();
        $pdo->beginTransaction();

        try {
            parent::update();

            $stmt = $pdo->prepare('
                UPDATE electronic
                SET brand = :brand, warranty_fee = :warranty_fee
                WHERE product_id = :product_id
            ');

            $stmt->execute([
                'brand' => $this->brand,
                'warranty_fee' => $this->warranty_fee,
                'product_id' => $this->GetId()
            ]);

            $pdo->commit();
            return $this;
        } catch (PDOException $e) {
            $pdo->rollBack();
            echo "Erreur lors de la mise à jour de l'électronique : " . $e->getMessage();
            return false;
        }
    }

     // hydratation
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
