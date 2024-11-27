<?php
require_once 'Circle.php';
require_once 'Cylinder.php';

// Test Circle
$circle = new Circle(2.5, "blue");

echo $circle . "<br>";

echo "Area of Circle: " . $circle->getArea() . "<br>";

// Test Cylinder
$cylinder = new Cylinder(3.0, 5.0, "green");

echo $cylinder . "<br>";

echo "Area of Cylinder Base: " . $cylinder->getArea() . "<br>";

echo "Volume of Cylinder: " . $cylinder->getVolume() . "<br>";

// Update properties and retest
$cylinder->setHeight(7.0);
$cylinder->setRadius(4.0);

echo "Updated Cylinder: " . $cylinder . "<br>";

echo "New Volume of Cylinder: " . $cylinder->getVolume() . "<br>";
