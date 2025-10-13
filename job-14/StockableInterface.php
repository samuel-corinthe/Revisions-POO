<?php

interface StockableInterface
{
    public function addStocks(int $stock): static;
    public function removeStocks(int $stock): static;
}
