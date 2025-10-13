<?php

require_once 'Category.php';
require_once 'Product.php';

// crée une catégorie
$category = new Category(
    1, 
    'Électronique', 
    'Tous les produits électroniques', 
    new DateTime('2025-10-13 10:00:00'), 
    new DateTime('2025-10-13 10:00:00')
);

// crée un produit rattaché à la catégorie
$product = new Product(101,'Smartphone',['photo1.jpg', 'photo2.jpg'],599,'Smartphone dernière génération',10,new DateTime('2025-10-13 10:05:00'),new DateTime('2025-10-13 10:05:00'),$category->GetId() );

// test des getters
echo "Catégorie : " . $category->GetName() . " (ID : " . $category->GetId() . ")" . PHP_EOL;
echo "Produit : " . $product->GetName() . " (ID : " . $product->GetId() . ")" . PHP_EOL;
echo "Produit appartient à la catégorie ID : " . $product->GetCategoryId() . PHP_EOL;

// test des setters
$product->setCategoryId(2);
$category->setName('Informatique');

echo "Après modification : " . PHP_EOL;
echo "Nouvelle catégorie : " . $category->GetName() . PHP_EOL;
echo "Nouvelle catégorie ID du produit : " . $product->GetCategoryId() . PHP_EOL;
