<?php
require_once 'Product.php';
require_once 'Category.php';


echo "<h3>TEST findAll()</h3>";

$products = Product::findAll();

if (empty($products)) {
    echo " Aucun produit trouvé dans la base de données.<br>";
} else {
    echo "Succes " . count($products) . " produit(s) trouvé(s) :<br><br>";

    foreach ($products as $product) {
        echo "ID : " . $product->GetId() . "<br>";
        echo "Nom : " . $product->GetName() . "<br>";
        echo "Prix : " . $product->GetPrice() . " €<br>";
        echo "Quantité : " . $product->GetQuantity() . "<br>";
        echo "Description : " . $product->GetDescription() . "<br>";

        // Récupère la catégorie liée
        $category = $product->getCategory();
        if ($category) {
            echo "Catégorie : " . $category->GetName() . "<br>";
        } else {
            echo "Catégorie : (aucune trouvée)<br>";
        }

        echo "<hr>";
    }
}
