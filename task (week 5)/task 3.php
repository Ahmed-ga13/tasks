<?php
class Rectangle
{

    private $length = 1.0;
    private $width = 1.0;


    public function __construct($length = 1.0, $width = 1.0)
    {
        $this->length = $length;
        $this->width = $width;
    }


    public function getLength()
    {
        return $this->length;
    }


    public function setLength($length)
    {
        $this->length = $length;
    }


    public function getWidth()
    {
        return $this->width;
    }


    public function setWidth($width)
    {
        $this->width = $width;
    }


    public function getArea()
    {
        return $this->length * $this->width; // Area = length * width
    }


    public function getPerimeter()
    {
        return 2 * ($this->length + $this->width);
    }


    public function __toString()
    {
        return "Rectangle[length={$this->length}, width={$this->width}]";
    }
}


$rectangle = new Rectangle();
echo $rectangle . "<br>";
echo "Area: " . $rectangle->getArea() . "<br>";
echo "Perimeter: " . $rectangle->getPerimeter() . "<br><br>";


$customRectangle = new Rectangle(4.5, 2.3);
echo $customRectangle . "<br>";
echo "Area: " . $customRectangle->getArea() . "<br>";
echo "Perimeter: " . $customRectangle->getPerimeter() . "<br><br>";


$customRectangle->setLength(6.0);
$customRectangle->setWidth(3.0);
echo $customRectangle . "<br>";
echo "Updated Area: " . $customRectangle->getArea() . "<br>";
echo "Updated Perimeter: " . $customRectangle->getPerimeter() . "<br>";
