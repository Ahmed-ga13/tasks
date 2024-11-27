<?php
require_once "Shape.php";

class Circle implements Shape
{
    protected $radius = 1.0;
    protected $color = "red";
    protected $filled = true;

    public function __construct($radius = 1.0, $color = "red", $filled = true)
    {
        $this->radius = $radius;
        $this->color = $color;
        $this->filled = $filled;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function isFilled()
    {
        return $this->filled;
    }

    public function setFilled($filled)
    {
        $this->filled = $filled;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function setRadius($radius)
    {
        $this->radius = $radius;
    }

    public function getArea()
    {
        return pi() * pow($this->radius, 2);
    }

    public function toString()
    {
        return "Circle [color={$this->color}, filled={$this->filled}, radius={$this->radius}]";
    }
}
