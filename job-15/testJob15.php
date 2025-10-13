<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Clothing;
use App\Electronic;
use DateTime;

// test Electronic
$electronic = new Electronic(
    0, 'Test Phone', ['img.jpg'], 500, 'Phone test', 10,
    new DateTime(), new DateTime(), 1, 'TestBrand', 50
);

$electronic->create();
echo "Electronic créé : ID {$electronic->GetId()}, quantity {$electronic->GetQuantity()}\n";

$electronic->addStocks(5)->update();
echo "Après ajout de 5 : quantity {$electronic->GetQuantity()}\n";

$electronic->removeStocks(12)->update();
echo "Après retrait de 12 : quantity {$electronic->GetQuantity()}\n";

// test Clothing
$clothing = new Clothing(
    0, 'Test T-Shirt', ['img2.jpg'], 30, 'T-shirt test', 20,
    new DateTime(), new DateTime(), 2, 'L', 'Rouge', 'T-shirt', 5
);

$clothing->create();
echo "Clothing créé : ID {$clothing->GetId()}, quantity {$clothing->GetQuantity()}\n";

$clothing->addStocks(10)->update();
echo "Après ajout de 10 : quantity {$clothing->GetQuantity()}\n";

$clothing->removeStocks(35)->update();
echo "Après retrait de 35 : quantity {$clothing->GetQuantity()}\n";
