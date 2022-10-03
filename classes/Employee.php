<?php 

class Employee extends User {
    //properties
    private $position; // string? "rep", "admin", "fin"

    // constructor
    function __Employee($n,$id,$add,$em,$pn,$un,$pass,$pos)
    {
        parent::__User($n,$id,$add,$em,$pn,$un,$pass);
        $this->position = $pos;
    }
    // methods: set/get, details
    function setPosition($pos)
    {
        $this->position = $pos;
    }
    function getPosition()
    {
        return $this->position;
    }
    function userDetails()
    {
        return "parent::userDetails() + Position: $this->position"; 
    }
    }

?>