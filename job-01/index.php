<?php
require_once 'Product.php';

$product = new Product( 1,'T-shirt',['https://picsum.photos/200/300'],1000,'A beautiful T-shirt',10,new DateTime(),new DateTime());

var_dump($product->getName());
$product->setName('Sweat-shirt');
var_dump($product->getName());

var_dump($product->getPrice());
$product->setPrice(1200);
var_dump($product->getPrice());

var_dump($product->getQuantity());
$product->setQuantity(5);
var_dump($product->getQuantity());

var_dump($product->getPhotos());
$product->setPhotos(['https://picsum.photos/300/400']);
var_dump($product->getPhotos());

var_dump($product->getDescription());
$product->setDescription('Un super Sweat-shirt');
var_dump($product->getDescription());

echo $product->getCreatedAt()->format('Y-m-d H:i:s') . "</br>";
echo $product->getUpdatedAt()->format('Y-m-d H:i:s');


