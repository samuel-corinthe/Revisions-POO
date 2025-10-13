<?php
require_once 'Product.php';
require_once 'Category.php';
require_once 'Clothing.php';
require_once 'Electronic.php';

// ajout cloth
$clothing = new Clothing(0,'T-shirt bleu',['https://picsum.photos/200'],1500,'Un beau t-shirt en coton bio',12,new DateTime(),new DateTime(),1,'M','Bleu','T-shirt',300);
$clothing->create();

// ajout elec
$phone = new Electronic(
    0,
    'Smartphone X12',
    ['https://picsum.photos/300'],
    99900,
    'Téléphone dernière génération',
    5,
    new DateTime(),
    new DateTime(),
    2,
    'TechCorp',
    1500
);
$phone->create();


// il suffit de rechearger l'index et check en db :)