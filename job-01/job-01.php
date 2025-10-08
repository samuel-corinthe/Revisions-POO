<?php 

class Product {
    private int $id=0;
    private string $name=' '; 
    private array $photos;
    private int $price=0;
    private string $description=' ';
    private int $quantity=1;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function setForce(string $name){
        
    }
}