<?php
require_once "Circle.php";
require_once "Rectangle.php";
require_once "Square.php";

$circle = new Circle(2.0, "blue", true);
$rectangle = new Rectangle(2.0, 3.0, "green", false);
$square = new Square(2.0, "yellow", true);

echo $circle->toString() . "<br>";
echo "Area of Circle: " . $circle->getArea() . "<br>";

echo $rectangle->toString() . "<br>";
echo "Area of Rectangle: " . $rectangle->getArea() . "<br>";
echo "Perimeter of Rectangle: " . $rectangle->getPerimeter() . "<br>";

echo $square->toString() . "<br>";
echo "Area of Square: " . $square->getArea() . "<br>";
