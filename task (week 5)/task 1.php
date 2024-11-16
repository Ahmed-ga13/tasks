<?php
class Circle
{

    private $radius = 1.0;
    private $color = "red";


    public function __construct($radius = 1.0, $color = "red")
    {
        $this->radius = $radius;
        $this->color = $color;
    }


    public function getRadius()
    {
        return $this->radius;
    }


    public function setRadius($radius)
    {
        $this->radius = $radius;
    }


    public function getColor()
    {
        return $this->color;
    }


    public function setColor($color)
    {
        $this->color = $color;
    }


    public function getArea()
    {
        return pi() * pow($this->radius, 2); // Area = πr²
    }


    public function __toString()
    {
        return "Circle[radius=" . $this->radius . ", color=" . $this->color . "]";
    }
}


$circle1 = new Circle();
echo $circle1 . "<br>";
echo "Area: " . $circle1->getArea() . "<br><br>";


$circle2 = new Circle(5.0);
echo $circle2 . "<br>";
echo "Area: " . $circle2->getArea() . "<br><br>";


$circle3 = new Circle(7.5, "blue");
echo $circle3 . "<br>";
echo "Area: " . $circle3->getArea() . "<br><br>";


$circle3->setRadius(10.0);
$circle3->setColor("green");
echo $circle3 . "<br>";
echo "Updated Area: " . $circle3->getArea() . "<br>";
