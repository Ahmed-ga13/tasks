<?php
require_once "Person.php"; 

class Staff extends Person
{
    private $school;
    private $pay;

    public function __construct($name, $address, $school, $pay)
    {
        parent::__construct($name, $address);
        $this->school = $school;
        $this->pay = $pay;
    }

    public function getSchool()
    {
        return $this->school;
    }

    public function setSchool($school)
    {
        $this->school = $school;
    }

    public function getPay()
    {
        return $this->pay;
    }

    public function setPay($pay)
    {
        $this->pay = $pay;
    }

    public function toString()
    {
        return "Staff[Person[name=" . $this->getName() . ", address=" . $this->getAddress() . "], school=" . $this->school . ", pay=" . $this->pay . "]";
    }
}
