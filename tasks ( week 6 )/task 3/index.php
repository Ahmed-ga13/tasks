<?php
require_once "Staff.php"; 
require_once "Student.php"; 


$staffMember = new Staff("John Doe", "123 Main St", "XYZ High School", 50000);


$studentMember = new Student("Jane Doe", "456 Oak St", "Computer Science", 2, 2000);


echo $staffMember->toString() . "<br>";
echo $studentMember->toString() . "<br>";
