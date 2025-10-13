<?php
require_once 'Product.php';
require_once 'Category.php';

// récup by id
echo "<h3>TEST findOneById() </h3>";

$product = new Product(
    0, '', [], 0, '', 0, new DateTime(), new DateTime(), 0
);

// récup product
$idToFind = 1; 
$result = $product->findOneById($idToFind);

if ($result === false) {
    echo "Aucun produit trouvé avec l'ID $idToFind.<br>";
} else {
    echo " Produit trouvé :<br>";
    echo "ID : " . $result->GetId() . "<br>";
    echo "Nom : " . $result->GetName() . "<br>";
    echo "Prix : " . $result->GetPrice() . " €<br>";
    echo "Quantité : " . $result->GetQuantity() . "<br>";
    echo "Créé le : " . $result->GetCreatedAt()->format('Y-m-d H:i:s') . "<br>";

    // récup catégorie li🔹 Récupère et affiche aussi la catégorie liée
    $category = $result->getCategory();
    if ($category) {
        echo "<br>Catégorie liée : " . $category->GetName() . "<br>";
        echo "Description : " . $category->GetDescription() . "<br>";
    } else {
        echo "<br> Aucune catégorie trouvée pour ce produit.<br>";
    }
}
