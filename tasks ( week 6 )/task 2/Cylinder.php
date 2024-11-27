<?php
require_once 'Circle.php';

class Cylinder extends Circle
{
    private float $height = 1.0;

    // Constructors
    public function __construct(float $radius = 1.0, float $height = 1.0, string $color = "red")
    {
        parent::__construct($radius, $color); // Call Circle's constructor
        $this->height = $height;
    }


    public function getHeight(): float
    {
        return $this->height;
    }

    public function setHeight(float $height): void
    {
        $this->height = $height;
    }


    public function getVolume(): float
    {
        return $this->getArea() * $this->height;
    }


    public function __toString(): string
    {
        return "Cylinder[" . parent::__toString() . ", height={$this->height}]";
    }
}
