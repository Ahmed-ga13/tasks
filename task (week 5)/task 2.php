<?php
class Employee
{

    private $id;
    private $firstName;
    private $lastName;
    private $salary;


    public function __construct($id, $firstName, $lastName, $salary)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->salary = $salary;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getFirstName()
    {
        return $this->firstName;
    }


    public function getLastName()
    {
        return $this->lastName;
    }


    public function getName()
    {
        return $this->firstName . " " . $this->lastName;
    }


    public function getSalary()
    {
        return $this->salary;
    }


    public function setSalary($salary)
    {
        $this->salary = $salary;
    }


    public function getAnnualSalary()
    {
        return $this->salary * 12;
    }


    public function raiseSalary($percent)
    {
        $this->salary += $this->salary * ($percent / 100);
        return $this->salary;
    }


    public function __toString()
    {
        return "Employee [id={$this->id}, name={$this->getName()}, salary={$this->salary}]";
    }
}


$employee = new Employee(1, "John", "Doe", 3000);
echo $employee . "<br>"; 

echo "Annual Salary: " . $employee->getAnnualSalary() . "<br>";


$newSalary = $employee->raiseSalary(10);
echo "New Salary after 10% raise: $newSalary<br>";

?>
