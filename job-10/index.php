<?php require_once 'Product.php';
      require_once 'Category.php'; 

$product = new Product(16, 'T-shirt',['https://picsum.photos/200/300'],1500,'A beautiful T-shirt',10,new DateTime(),new DateTime(),1);
$product->setName('T-shirt 238');
$product->setQuantity(24);
$product->update();
