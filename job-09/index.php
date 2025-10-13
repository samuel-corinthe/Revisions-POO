<?php

require_once 'Product.php';
require_once 'Category.php';

$product = new Product(0,'Iphone',['https://picsum.photos/200/301'],25,'Iphone stylée pour l\'été',15,new DateTime(),new DateTime(),2 );

$result = $product->create();

if ($result) {
    echo "Produit ajouté avec succès ! ID : " . $result->GetId();
} else {
    echo "Erreur lors de l\'ajout du produit.";
}
