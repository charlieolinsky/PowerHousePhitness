<?php 

class Customer extends User {
    
//properties 
// need order history?
private $membershipLevel;
private $points; // not in constructor 
private $lockerNumber; // can be null
private $lockCombo; // can be null
private $isEmployee; // boolean

//constructor
function __Customer($n,$id,$add,$em,$pn,$pass,$ml,$pt,$ln,$lc,$ie)
{
    parent::__User($n,$id,$add,$em,$pn,$pass);
    $this->membershipLevel = $ml;
    $this->lockerNumber = $ln;
    $this->lockerCombo = $lc;
    $this->isEmployee = $ie;

}
//methods (sets/gets, details, points)
function setMembershipLevel($ml)
{
    $this->membershipLevel = $ml;
}
function setLockerNumer($ln)
{
    $this->lockerNumber = $ln;
}
function setLockerCombo($lc)
{
    $this->lockerCobo = $lc;
}
function setIsEmployee($ie)
{
    $this->isEmployee = $ie;
}
function getMembershipLevel()
{
    return $this->membershipLevel;
}
function getLockerNumber()
{
    return $this->lockerNumber;
}
function getLockerCombo()
{
    return $this->lockerCombo;
}
function getIsEmployee()
{
    return $this->isEmployee;
}
function userDetails()
{
    return parent::userDetails() + "Membership Level: $this->membershipLevel\n Points: $this->points\n Locker Number: $this->lockerNumber\n Locker Combo: $this->lockerCombo\n";
}
function points($sales = [])
{
    $sum = 0;
    for ($i = 0; $i<count($sales); $i++){
        $sum+=$sales[$i];
    }
    return $sum;
}
}

?>