<?php
require_once "Rectangle.php";

class Square extends Rectangle
{
    protected $side;

    public function __construct($side = 1.0, $color = "red", $filled = true)
    {
        parent::__construct($side, $side, $color, $filled);
        $this->side = $side;
    }

    public function getSide()
    {
        return $this->side;
    }

    public function setSide($side)
    {
        $this->side = $side;
        $this->setWidth($side);  
        $this->setLength($side); 
    }

    public function toString()
    {
        return "Square [color={$this->color}, filled={$this->filled}, side={$this->side}]";
    }
}
