<?php
require_once 'AbstractProduct.php';
require_once 'Electronic.php';
require_once 'Clothing.php';

echo "<h2>TEST StockableInterface </h2>";

// create eletronic product
$electronic = new Electronic(0,'Smartphone',['https://picsum.photos/200/300'],999,'Un téléphone haut de gamme',10, new DateTime(),new DateTime(),2, 'Samsung',50);

echo "Electronic créé : ID temporaire {$electronic->GetId()}, quantity {$electronic->GetQuantity()}<br>";

$electronic->addStocks(5);
echo "Après ajout de 5 : quantity {$electronic->GetQuantity()}<br>";

$electronic->removeStocks(12);
echo "Après retrait de 12 : quantity {$electronic->GetQuantity()}<br>";

// create clothproduct
$clothing = new Clothing(0,'T-shirt',['https://picsum.photos/200/300'],29,'T-shirt 100% coton',20,new DateTime(),new DateTime(),1, 'L','Noir','Homme',5);

echo "<br>Clothing créé : ID temporaire {$clothing->GetId()}, quantity {$clothing->GetQuantity()}<br>";

$clothing->addStocks(10);
echo "Après ajout de 10 : quantity {$clothing->GetQuantity()}<br>";

$clothing->removeStocks(35);
echo "Après retrait de 35 : quantity {$clothing->GetQuantity()}<br>";
