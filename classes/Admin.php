<?php 

class Admin extends Employee {
    //properties
    private $salary;
    //constructor 
    function __Admin($n,$id,$add,$em,$pn,$un,$pass,$sal)
    {
        parent::__User($n,$id,$add,$em,$pn,$un,$pass);
        $this->salary = $sal;
    }
     //methods: set/get, details, 
    function setSalary($sal)
    {
          $this->salary = $sal;
    }
    function getSalary()
    {
          return $this->salary;
    }
    function userDetails()
    {
        return "parent::userDetails() + Salary: $this->salary\n";
    }
}
?>