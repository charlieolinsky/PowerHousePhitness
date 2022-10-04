<?php 

class Representative extends Employee {
      //properties
      private $hourlyRate;
      //constructor 
      function __Representative($n,$id,$add,$em,$pn,$un,$pass,$pos,$hr)
      {
            parent::__User($n,$id,$add,$em,$pn,$un,$pass,$pos);
            $this->hourlyRate = $hr;
      }
        //methods: set/get, details,
      function setHourlyRate($hr)
      {
            $this->hourlyRate = $hr;
      }
      function getHourlyRate()
      {
            return $this->hourlyRate;
      }
      function userDetails()
      {
          return "parent::userDetails() + Hourly Rate: $this->hourlyRate\n";
      }
}

?>