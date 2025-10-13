<?php
require_once 'Product.php'; 
require_once 'Category.php';

$pdo = Database::getConnexion();

// recup id 7
$stmt = $pdo->prepare('SELECT * FROM product WHERE id = :id');
$stmt->execute(['id' => 7]);
$productData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$productData) {
    echo "Aucun produit trouvé avec l'ID 7.";
    exit;
}

$product = Product::fromArray($productData);

// récup id
$stmt = $pdo->prepare('SELECT * FROM category WHERE id = :id');
$stmt->execute(['id' => $product->GetCategoryId()]);
$categoryData = $stmt->fetch(PDO::FETCH_ASSOC);

$category = null;
if ($categoryData) {
    $category = new Category(
        (int)$categoryData['id'],
        $categoryData['name'],
        $categoryData['description'],
        new DateTime($categoryData['createdAt']),
        new DateTime($categoryData['updatedAt'])
    );
}

// Produit
echo "<h2>Produit ID 7</h2>";
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

if ($category) {
    echo "<strong>Catégorie :</strong> " . $category->GetName() . " (" . $category->GetDescription() . ")<br>";
} else {
    echo "<strong>Catégorie :</strong> Non définie<br>";
}
