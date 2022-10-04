<?php 

class FinancePersonel extends Employee {
      //properties
      private $salary;
      //constructor 
      function __FinancePersonel($n,$id,$add,$em,$pn,$un,$pass,$pos,$sal)
      {
        parent::__User($n,$id,$add,$em,$pn,$un,$pass,$pos);
        $this->salary = $sal;
      }
      //methods: set/get, detail
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