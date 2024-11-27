<?php
require_once "Shape.php";

class Rectangle implements Shape
{
    protected $width = 1.0;
    protected $length = 1.0;
    protected $color = "red";
    protected $filled = true;

    public function __construct($width = 1.0, $length = 1.0, $color = "red", $filled = true)
    {
        $this->width = $width;
        $this->length = $length;
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

    public function getArea()
    {
        return $this->width * $this->length;
    }

    public function getPerimeter()
    {
        return 2 * ($this->width + $this->length);
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function toString()
    {
        return "Rectangle [color={$this->color}, filled={$this->filled}, width={$this->width}, length={$this->length}]";
    }
}
