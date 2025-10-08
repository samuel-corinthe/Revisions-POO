<?php
require_once 'Product.php';

// Récupérer la catégorie par ID (ici, ID 1 par exemple)
$pdo = Database::getConnexion();
$stmt = $pdo->prepare('SELECT * FROM category WHERE id = :id');
$stmt->execute(['id' => 1]);
$categoryData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$categoryData) {
    echo "Aucune catégorie trouvée avec l'ID 1.";
    exit;
}

$category = new Category(
    (int)$categoryData['id'],
    $categoryData['name'],
    $categoryData['description'],
    new DateTime($categoryData['createdAt']),
    new DateTime($categoryData['updatedAt'])
);

// Récupérer tous les produits de la catégorie
$products = $category->getProducts();

echo "<h2>Catégorie : " . $category->GetName() . "</h2>";
echo "<strong>Description :</strong> " . $category->GetDescription() . "<br><br>";

if (empty($products)) {
    echo "Aucun produit trouvé dans cette catégorie.";
} else {
    echo "<h3>Produits :</h3>";
    foreach ($products as $product) {
        echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px;'>";
        echo "<strong>Nom :</strong> " . $product->GetName() . "<br>";
        echo "<strong>Prix :</strong> " . $product->GetPrice() . " €<br>";
        echo "<strong>Quantité :</strong> " . $product->GetQuantity() . "<br>";
        echo "<strong>Description :</strong> " . $product->GetDescription() . "<br>";
        echo "<strong>Photos :</strong><br>";
        foreach ($product->GetPhotos() as $photo) {
            echo "<img src='images/$photo' alt='$photo' style='width:100px;margin:5px;'>";
        }
        echo "<br><strong>Date création :</strong> " . $product->GetCreatedAt()->format('Y-m-d H:i:s') . "<br>";
        echo "<strong>Date maj :</strong> " . $product->GetUpdatedAt()->format('Y-m-d H:i:s') . "<br>";
        echo "</div>";
    }
}
