<?php
require_once 'Product.php'; 

// Récupérer le produit ID 7 directement
$product = Product::findById(7);

if (!$product) {
    echo "Aucun produit trouvé avec l'ID 7.";
    exit;
}

// Récupérer la catégorie via la méthode getCategory()
$category = $product->getCategory();

// Affichage du produit
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

// Affichage de la catégorie
if ($category) {
    echo "<strong>Catégorie :</strong> " . $category->GetName() . " (" . $category->GetDescription() . ")<br>";
} else {
    echo "<strong>Catégorie :</strong> Non définie<br>";
}
