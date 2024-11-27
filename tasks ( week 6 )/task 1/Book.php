<?php
require_once 'Author.php';

class Book
{
    private string $isbn;
    private string $name;
    private Author $author;
    private float $price;
    private int $qty = 0;

    public function __construct(string $isbn, string $name, Author $author, float $price, int $qty = 0)
    {
        $this->isbn = $isbn;
        $this->name = $name;
        $this->author = $author;
        $this->price = $price;
        $this->qty = $qty;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    public function setQty(int $qty): void
    {
        $this->qty = $qty;
    }

    public function getAuthorName(): string
    {
        return $this->author->getName();
    }

    public function __toString(): string
    {
        return "Book[isbn={$this->isbn}, name={$this->name}, {$this->author}, price={$this->price}, qty={$this->qty}]";
    }
}
