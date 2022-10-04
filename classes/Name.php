<?php
class Name{

    //properties
    private $firstName;
    private $lastName;
    // constructor
    function __construct($firstName, $lastName){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    //methods
    // **make first letter upper, rest lower
    function setFirstName($firstName){
        $this->name = $firstName;
    }
    function setLastName($lastName){
        $this->name = $lastName;
    }
    function getFirstName(){
        return $this->firstName;
    }
    function getLastName(){
       return  $this->lastName;
    }
    function fullName(){
        return "$this->firstName, $this->lastName";
    }
}
?>